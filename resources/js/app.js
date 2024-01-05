import './bootstrap';

import { createApp } from 'vue';

import app from './Component/app.vue'

import router from './router/index.js'

createApp({}).use(router).mount('#app')