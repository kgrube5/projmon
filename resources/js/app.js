require('./bootstrap');

import Vue from 'vue';
import router from './router/index';
import store from './store/index';
import guards from './router/guards';

import App from './App.vue';

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router,
    store
});