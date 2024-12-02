import { createRouter, createWebHistory } from "vue-router";
import LoginComponent from "../views/components/auth/LoginComponent.vue";
import BoardListComponent from "../views/components/board/BoardListComponent.vue";
import BoardCreateComponent from "../views/components/board/BoardCreateComponent.vue";
import UserRegistrationComponent from "../views/components/users/UserRegistrationComponent.vue";


const routes = [
    //가장먼저 login화면 으로 연결
    {
        path: '/',
        redirect: '/login' 
    },
    //login 호출하면 login 화면으로 이동
    {
        path: '/login',
        component: LoginComponent,
    },
    //board list 페이지로 이동
    {
        path: '/boards',
        component: BoardListComponent,
    },
    //board create 페이지로 이동
    {
        path: '/boards/create',
        component: BoardCreateComponent,
    },
    //회원가입 페이지로 이동
    {
        path: '/registration',
        component: UserRegistrationComponent,
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;