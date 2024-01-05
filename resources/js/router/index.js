import { createRouter, createWebHistory } from "vue-router";

import ProdukIndex from '../Component/produk/index.vue'
import ProdukCreate from '../Component/produk/create.vue'
import ProdukEdit from '../Component/produk/edit.vue'

import categoriesIndex from '../Component/categories/index.vue'
import categoriesCreate from '../Component/categories/create.vue'
import categoriesEdit from '../Component/categories/edit.vue'


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

    {
        path:'/categories_vue/',
        component: categoriesIndex,
    },
    {
        path:'/categories_vue/create',
        component: categoriesCreate,
    },
    {
        path:'/categories_vue/edit/:id',
        component: categoriesEdit,
        props: true,
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router