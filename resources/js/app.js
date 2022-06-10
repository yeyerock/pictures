import './bootstrap';
import Vue from 'vue'
window.Vue = require('vue');;


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import App from './components/App.vue';
import VueAxios from 'vue-axios';
import axios from 'axios';

import {createRouter, createWebHistory} from "vue-router";
import { routes } from './routes';
// import Vue from 'vue';
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = createRouter({
    history: createWebHistory(),
    routes
})

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App)
});

export default app;