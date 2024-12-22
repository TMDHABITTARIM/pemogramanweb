<script setup>

//import ref and onMounted
import { ref, onMounted } from 'vue';

//import api
import api from '../../api';

//define state
const product = ref([]);

//method fetchDataProduct
const fetchDataProduct = async () => {
    //fetch data 
    await api.get('/api/product')
        .then(response => {
            //set response data to state "product"
            product.value = response.data.data
        });
}

//run hook "onMounted"
onMounted(() => {
    //call method "fetchDataProduct"
    fetchDataProduct();
});

//method deleteProduct
const deleteProduct = async (id) => {
    //delete product with API
    await api.delete(`/api/product/${id}`)
        .then(() => {
            //call method "fetchDataproduct"
            fetchDataProduct();
        })
};

</script>

<template>
    <div class="container">
        <div class="header">
            <router-link :to="{ name: 'product.create' }" class="btn-add">+ Add New Product
            </router-link>
        </div>
        <div class="card">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Deskripsi produk</th>
                        <th scope="col">Harga Produk</th>
                        <th scope="col">Gambar Produk</th>
                        <th scope="col" style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Kondisi ketika tidak ada data sinema -->
                    <tr v-if="product.length === 0">
                        <td colspan="4" class="empty-data">
                            Data Not Available!
                        </td>
                    </tr>
                    <!-- Looping data sinema -->
                    <tr v-else v-for="(post, index) in product" :key="index">
                        <td>{{ post.nama_produk }}</td>
                        <td>{{ post.deskripsi_produk }}</td>
                        <td>{{ post.harga_produk }}</td>
                        <td class="text-center">
                            <img :src="post.gambar_produk" alt="Gambar Produk">
                        </td>
                        <td class="actions">
                            <router-link :to="{ name: 'product.edit', params: {id:post.id} }" class="btn-edit">
                                Edit
                            </router-link>

                            <button @click="deleteProduct(post.id)" class="btn-delete">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<style scoped>
/* General styling */
body {
    background-color: #000;
    color: #fff;
    font-family: Arial, sans-serif;
}

/* Container styling */
.container {
    max-width: 1000px;
    margin: 40px auto;
    font-family: Arial, sans-serif;
}

/* Header section */
.header {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
}

.btn-add {
    background-color: #007bff;
    color: rgb(255, 255, 255);
    font-weight: bold;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-add:hover {
    background-color: #0666cd;
}

/* Card and table styling */
.card {
    background-color: #1a1a1a;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
}

.custom-table {
    width: 100%;
    border-collapse: collapse;
    text-align: center;
}

.custom-table th,
.custom-table td {
    border-bottom: 1px solid #444;
    padding: 12px;
    vertical-align: middle;
}

.custom-table th {
    background-color: #333;
    color: #ffffff;
    text-align: center;
    font-size: 1rem;
}

.custom-table td {
    color: #ddd;
}

.custom-table .text-center {
    text-align: center;
}

.custom-table .empty-data {
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    color: #888;
    padding: 20px;
}

/* Image styling */
.cinema-image {
    max-width: 120px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
}

/* Button styling */
.actions {
    display: flex;
    justify-content: center;
}

.actions button,
.actions .btn-edit {
    margin: 0 5px;
    padding: 6px 12px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    border: none;
    transition: background-color 0.3s ease;
}

.btn-edit {
    background-color: #007bff;
    color: rgb(255, 255, 255);
}

.btn-edit:hover {
    background-color: #0666cd;
}

.btn-delete {
    background-color: #dc3545;
    color: white;
}

.btn-delete:hover {
    background-color: #c82333;
}
</style>
