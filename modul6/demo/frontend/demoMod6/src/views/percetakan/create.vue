<script setup>
//import ref
import { ref } from "vue";

//import router
import { useRouter } from 'vue-router';

//import api
import api from "../../api";

//init router
const router = useRouter();

//define state
const tipe_cetak = ref("");
const harga_cetak = ref("");
const gambar_cetak = ref("");
const errors = ref([]);

//method for handle file changes
const handleFileChange = (e) => {
    //assign file to state
    gambar_cetak.value = e.target.files[0];
};

//method "storeActor"
const storePercetakan = async () => {

    //init formData
    let formData = new FormData();

    //assign state value to formData
    formData.append("tipe_cetak", tipe_cetak.value);
    formData.append("harga_cetak", harga_cetak.value);
    formData.append("gambar_cetak", gambar_cetak.value);


    //store data with API
    await api.post('/api/percetakan', formData)
        .then(() => {
            //redirect
            router.push({ path: "/percetakan" });
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
            <router-link :to="{ name: 'percetakan.index' }" class="btn-add">Add Percetakan</router-link>
        </div>
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="storePercetakan()">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tipe Cetak</label>
                        <input type="text" class="form-control" v-model="tipe_cetak" placeholder="Tipe Cetak">
                        <div v-if="errors.tipe_cetak" class="alert alert-danger mt-2">
                            <span>{{ errors.tipe_cetak[0] }}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Harga Cetak</label>
                        <input type="text" class="form-control custom-input" v-model="harga_cetak" placeholder="harga_cetak">
                        <div v-if="errors.harga_cetak" class="alert alert-danger mt-2">
                            <span>{{ errors.harga_cetak[0] }}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Gambar Cetak</label>
                        <input type="file" class="form-control" @change="handleFileChange($event)">
                        <div v-if="errors.gambar_cetak" class="alert alert-danger mt-2">
                            <span>{{ errors.gambar_cetak[0] }}</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-md btn-primary rounded-sm shadow border-0">Save</button>
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

/* Button to Add New Actor */
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
    background-color: #045fc1;
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
    border-color: #3de2c6;
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