<script setup>
    import { onMounted, ref } from 'vue';
    import { useRouter } from 'vue-router';

    const router = useRouter()

    let produk = ref([])

    onMounted(async () => {
        getProduk()
    })

    const getProduk = async () => {
        let response = await axios.get('/api/produk')
        //console.log('response', response)
        produk.value = response.data
    }

    const CreateProduk = async () => {
        router.push('/product_vue/create')
    }

    const EditProduk = (id) => {
        router.push('/product_vue/edit/'+id)
    }

    const DeleteProduk = (id) => {
        if(confirm("Do you really want to delete?")){
            axios.delete('/api/produk/'+id)
            getProduk()
        }
    }
</script>
<template>
    <div class="container">
        <h1>List Produk</h1>
        <button @click="CreateProduk">Add</button>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produk</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody v-for="item in produk" :key="item.id" v-if="produk.length > 0">
                <tr>
                    <td>{{ item.id }}</td>
                    <td>{{ item.produk }}</td>
                    <td>{{ item.price }}</td>
                    <td>{{ item.stock }}</td>
                    <td style="display: flex;">
                        <button @click="EditProduk(item.id)">Edit</button>
                        <button @click="DeleteProduk(item.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="5">Data Not Found</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>