import { createRouter, createWebHistory } from "vue-router";

import ProdukIndex from '../Component/produk/index.vue'
import ProdukCreate from '../Component/produk/create.vue'
import ProdukEdit from '../Component/produk/edit.vue'

const routes = [
    {
        path:'/product_vue/',
        component: ProdukIndex,
    },
    {
        path:'/product_vue/create',
        component: ProdukCreate,
    },
    {
        path:'/product_vue/edit/:id',
        component: ProdukEdit,
        props: true,
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router