import App from '../App.vue';
import Profile from '../components/ProfileComponent';
import Login from '../components/LoginComponent';
import Dashboard from '../components/DashboardComponent';
import Tasks from '../components/TasksComponent';
import Task from '../components/TaskComponent';
import Projects from '../components/ProjectsComponent';
import Project from '../components/ProjectComponent';
import ProjectCreate from '../components/ProjectCreateComponent';
import Missing from '../components/Missing';
import Register from '../components/RegisterComponent';

const routes = [
    { path: '/', redirect: {name: 'login'} },
    { path: '/login', name:'login', component: Login },
    { path: '/register', name:'register', component: Register },
    { path: '/dashboard', name:'dashboard', component: Dashboard },
    { path: '/profile', name:'profile', component: Profile },
    { path: '/tasks', name:'tasks', component: Tasks },
    { path: '/projects', name:'projects', component: Projects },
    { path: '/projects/create', name:'project-create', component: ProjectCreate },
    { path: '/projects/:id', name:'project', component: Project },
    { path: '/projects/:id/tasks/:taskid', name:'task', component: Task },
    { path: '*', name: 'missing', component: Missing },
];

export default routes;