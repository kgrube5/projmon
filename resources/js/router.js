import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import App from './components/App';

export default new VueRouter({
    base: '/',
    mode: 'history',
    routes: [
        { path: '/', component: App }
    ]
});