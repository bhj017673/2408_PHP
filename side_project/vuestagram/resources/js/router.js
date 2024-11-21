import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../views/components/auth/LoginComponent.vue';
import BoardListComponent from '../views/components/board/BoardListComponent.vue';
import BoardCreateComponent from '../views/components/board/BoardCreateComponent.vue';
import UserRegisterationComponent from '../views/components/UserRegisterationComponent.vue';

const routes= [
    {
        path: '/',
        redirect:'login'
    }
    
    ,{
        path:'/login',
        component: LoginComponent  
    },
    {
        path: '/board',
        component: BoardListComponent
    },
    {
        path: '/board/create',
        component: BoardCreateComponent
    },
    {
        path:'/registration',
        component: UserRegisterationComponent
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});


export default router;