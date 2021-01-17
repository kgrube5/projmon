require('./bootstrap');

import Vue from 'vue';
import router from './router';
import store from './store/index';

import App from './App.vue';

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router,
    store
});