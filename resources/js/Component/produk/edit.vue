<script setup>
import { onMounted, ref, defineProps } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

const router = useRouter();

const props = defineProps(['id']);

let form = ref({ produk: '', price: 0, stock: 0 });

onMounted(async () => {
    createForm();
    getProduk();
});

const createForm = async () => {
    try {
        let response = await axios.get('/api/produk_form');
        form.value = response.data;
    } catch (error) {
        console.error('Error fetching form data:', error);
    }
};

const getProduk = async () => {
    try {
        let response = await axios.get(`/api/produk/${props.id}`);
        form.value = response.data;
    } catch (error) {
        console.error('Error fetching product data:', error);
    }
};

const onUpdate = async () => {
    try {
        const formData = new FormData();
        formData.append('api_produk', form.value.produk);
        formData.append('api_price', form.value.price);
        formData.append('api_stock', form.value.stock);

        await axios.post(`/api/produk_update/${props.id}`, formData);
        router.push('/product_vue');
    } catch (error) {
        console.error('Error updating product:', error);
    }
};

const onBack = () => {
    router.push('/product_vue');
};
</script>

<template>
    <div>
        <h1>Edit Produk</h1>
        <hr>
        <table>
            <tr>
                <td>Produk</td>
                <td><input type="text" v-model="form.produk" required></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="number" v-model="form.price" required></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td><input type="number" v-model="form.stock" required></td>
            </tr>
            <tr>
                <td>
                    <button @click="onUpdate">Update</button>
                </td>
                <td>
                    <button @click="onBack">Back</button>
                </td>
            </tr>
        </table>
    </div>
</template>
