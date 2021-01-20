import router from './index';
import store from '../store/index'

router.beforeEach((to, from, next) => {
    if(
        to.name === 'dashboard' && store.state.user == null ||
        to.name === 'projects' && store.state.user == null ||
        to.name === 'project' && store.state.user == null ||
        to.name === 'tasks' && store.state.user == null ||
        to.name === 'task' && store.state.user == null
    ) {
        next('/login');
    }

    if(
        to.name === 'login' && store.state.user != null ||
        to.path === '/' && store.state.user != null
    ) {
        next('/dashboard');
    }

    next();
});