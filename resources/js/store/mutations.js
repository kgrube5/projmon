export default {
    updateUser(state, payload) {
        state.user = payload;
    },
    removeUser(state) {
        state.user = null;
    },
    toggleLoginRegister(state) {
        state.toggleLoginRegister = !state.toggleLoginRegister;
    },
    toggleCreateProject(state) {
        state.toggleCreateProject = !state.toggleCreateProject;
    },
    toggleCreateTask(state) {
        state.toggleCreateTask = !state.toggleCreateTask;
    }
}