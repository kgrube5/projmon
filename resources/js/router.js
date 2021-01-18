import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import App from './App.vue';
import Profile from './components/ProfileComponent';
import Login from './components/LoginComponent';
import Dashboard from './components/DashboardComponent';
import Tasks from './components/TasksComponent';
import Task from './components/TaskComponent';
import Projects from './components/ProjectsComponent';
import Project from './components/ProjectComponent';

export default new VueRouter({
    base: '/',
    mode: 'history',
    routes: [
        { path: '/', name:'home', component: App },
        { path: '/login', name:'login', component: Login },
        { path: '/dashboard', name:'dashboard', component: Dashboard },
        { path: '/profile', name:'profile', component: Profile },
        { path: '/tasks', name:'tasks', component: Tasks },
        { path: '/tasks/:id', name:'task', component: Task },
        { path: '/projects', name:'projects', component: Projects },
        { path: '/projects/:id', name:'project', component: Project }
    ]
});