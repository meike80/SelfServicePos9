<script setup>
import { onMounted, ref, defineProps } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

const router = useRouter();

const props = defineProps(['id']);

let form = ref({ categores: '', price: 0, stock: 0 });

onMounted(async () => {
    createForm();
    getcategores();
});

const createForm = async () => {
    try {
        let response = await axios.get('/api/categores_form');
        form.value = response.data;
    } catch (error) {
        console.error('Error fetching form data:', error);
    }
};

const getcategores = async () => {
    try {
        let response = await axios.get(`/api/categores/${props.id}`);
        form.value = response.data;
    } catch (error) {
        console.error('Error fetching categores data:', error);
    }
};

const onUpdate = async () => {
    try {
        const formData = new FormData();
        formData.append('api_categores', form.value.categores);
        formData.append('api_price', form.value.price);
        formData.append('api_stock', form.value.stock);

        await axios.post(`/api/categores_update/${props.id}`, formData);
        router.push('/categores_vue');
    } catch (error) {
        console.error('Error updating categores:', error);
    }
};

const onBack = () => {
    router.push('/categores_vue');
};
</script>

<template>
    <div>
        <h1>Edit categores</h1>
        <hr>
        <table>
            <tr>
                <td>categores</td>
                <td><input type="text" v-model="form.categores" required></td>
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
