<script setup>
    import { onMounted, ref } from 'vue';
    import { useRouter } from 'vue-router';

    const router = useRouter()

    let categores = ref([])

    onMounted(async () => {
        getcategories()
    })

    const getcategories = async () => {
        let response = await axios.get('/api/categories')
        //console.log('response', response)
        categories.value = response.data
    }

    const Createcategories = async () => {
        router.push('/categories_vue/create')
    }

    const Editcategories = (id) => {
        router.push('/categories_vue/edit/'+id)
    }

    const Deletecategores = (id) => {
        if(confirm("Do you really want to delete?")){
            axios.delete('/api/categories/'+id)
            getcategories()
        }
    }
</script>
<template>
    <div class="container">
        <h1>List categories</h1>
        <button @click="Createcategories">Add</button>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>categories</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody v-for="item in categories" :key="item.id" v-if="categories.length > 0">
                <tr>
                    <td>{{ item.id }}</td>
                    <td>{{ item.categories }}</td>
                    <td>{{ item.price }}</td>
                    <td>{{ item.stock }}</td>
                    <td style="display: flex;">
                        <button @click="Editcategories(item.id)">Edit</button>
                        <button @click="Deletecategories(item.id)">Delete</button>
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