<script setup>
    //import ref
    import { ref, onMounted } from "vue";
 
    //import router
    import { useRouter, useRoute } from 'vue-router';
 
    //import api
    import api from "../../api";
 
    //init router
    const router = useRouter();
 
    //init route
    const route = useRoute();
 
    //define state
    const nama_produk = ref("");
    const deskripsi_produk = ref("");
    const harga_produk = ref("");
    const gambar_produk = ref("");
    const errors = ref([]);
 
    //onMounted
    onMounted( async () => {
 
        //fetch detail data post by ID
        await api.get(`/api/product/${route.params.id}`)
        .then(response => {
 
            //set response data to state
            nama_produk.value = response.data.data.nama_produk
            deskripsi_produk.value = response.data.data.deskripsi_produk
        });
    })
 
    //method for handle file changes
    const handleFileChange = (e) => {
        //assign file to state
        gambar_produk.value = e.target.files[0];
    };
 
    //method "updatePost"
    const updateProduct = async () => {
 
        //init formData
        let formData = new FormData();
 
        //assign state value to formData
        formData.append("nama_produk", nama_produk.value);
        formData.append("deskripsi_produk", deskripsi_produk.value);
        formData.append("harga_produk", harga_produk.value);
        formData.append("gambar_produk", gambar_produk.value);
        formData.append("_method", "PATCH");
 
        //store data with API
        await api.post(`/api/product/${route.params.id}`, formData)
        .then(() => {
            //redirect
            router.push({ path: "/product" });
        })
        .catch((error) => {
            //assign response error data to state "errors"
            errors.value = error.response.data;
        });
    };
</script>
 
<template>
    <div class="container mt-5">
        <div class="header">
            <router-link :to="{ name: 'product.index' }" class="btn-add">+ Add New Produk</router-link>
        </div>
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="updateProduct()">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Produk</label>
                        <input type="text" class="form-control" v-model="nama_produk" placeholder="Nama Produk">
                        <div v-if="errors.nama_produk" class="alert alert-danger mt-2">
                            <span>{{ errors.nama_produk[0] }}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">deskripsi_produk</label>
                        <input type="text" class="form-control" v-model="deskripsi_produk" placeholder="Cinema deskripsi_produk">
                        <div v-if="errors.deskripsi_produk" class="alert alert-danger mt-2">
                            <span>{{ errors.deskripsi_produk[0] }}</span>
                        </div>
                     </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">harga_produk</label>
                        <input type="text" class="form-control" v-model="harga_produk" placeholder="Harga_produk">
                        <div v-if="errors.harga_produk" class="alert alert-danger mt-2">
                            <span>{{ errors.harga_produk[0] }}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Cinema Image</label>
                        <input type="file" class="form-control" @change="handleFileChange($event)">
                        <div v-if="errors.gambar_produk" class="alert alert-danger mt-2">
                            <span>{{ errors.gambar_produk[0] }}</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-md btn-primary rounded-sm shadow border-0">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>

body {
    background-color: #000;
    color: #fff;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
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

/* Button to Add New Cinema */
.btn-add {
    background-color: #007bff;
    color: rgb(255, 255, 255);
    font-weight: bold;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    display: inline-block;
    font-size: 16px;
}

.btn-add:hover {
    background-color: #0666cd;
}

/* Card styling */
.card {
    background-color: #1a1a1a;
    border-radius: 8px;
    padding: 25px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
}

/* Form label styling */
.form-label {
    color: #fff;
    font-weight: 600;
    margin-bottom: 10px;
    display: inline-block;
}

/* Input and file input styling */
.form-control {
    background-color: #333;
    color: #ddd;
    border: 1px solid #444;
    border-radius: 5px;
    padding: 12px;
    width: 100%;
    font-size: 14px;
}

.form-control:focus {
    background-color: #444;
    border-color: #007bff;
    outline: none;
}

/* Button styling */
button[type="submit"] {
    background-color: #007bff;
    color: rgb(255, 255, 255);
    font-weight: bold;
    padding: 12px 25px;
    border-radius: 5px;
    cursor: pointer;
    border: none;
    font-size: 16px;
    width: 100%;
    margin-top: 20px;
}

button[type="submit"]:hover {
    background-color: #0666cd;
}

/* Error message styling */
.alert {
    background-color: #dc3545;
    color: white;
    border-radius: 5px;
    font-size: 14px;
    padding: 10px;
    margin-top: 10px;
}

/* Responsive design: make sure elements are well-spaced on smaller screens */
@media (max-width: 768px) {
    .container {
        margin: 20px;
    }

    .btn-add {
        font-size: 14px;
        padding: 8px 15px;
    }

    .card {
        padding: 20px;
    }

    .form-control {
        padding: 10px;
    }

    button[type="submit"] {
        font-size: 14px;
        padding: 10px 20px;
    }
}

</style>