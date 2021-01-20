export default {
    updateUser(state, payload) {
        state.user = payload;
    },
    removeUser(state) {
        state.user = null;
    },
    toggleLoginRegister(state) {
        state.toggleLoginRegister = !state.toggleLoginRegister;
    }
}