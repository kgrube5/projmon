require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';

Vue.use(Vuex);

const store = new Vuex.Store({
    plugins: [createPersistedState({
        storage: window.sessionStorage,
    })],
    state: {
        user: null
    },
    mutations: {
        updateUser(state, payload) {
            state.user = payload;
        },
        removeUser(state) {
            state.user = null;
        }
    }
});

import App from './components/App';
import router from './router';

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router,
    store
})