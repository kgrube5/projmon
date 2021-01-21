import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';
import mutations from './mutations';
import actions from './actions';
import getters from './getters';

Vue.use(Vuex);

export default new Vuex.Store({
    plugins: [createPersistedState({
        storage: window.sessionStorage,
    })],
    state: {
        user: null,
        toggleLoginRegister: false,
        toggleCreateProject: false,
        toggleCreateTask: false
    },
    modules: {},
    getters: getters,
    mutations: mutations,
    actions: actions
});