import { createWebHistory, createRouter } from "vue-router";
import LoginComponent from "../views/components/auth/LoginComponent.vue";
import BoardListComponent from "../views/components/board/BoardListComponent.vue";
import BoardCreateComponent from "../views/components/board/BoardCreateComponent.vue";
import UserRegistration from "../views/components/users/UserRegistration.vue";

const routes = [
    {
        path: '/',
        redirect: '/login' //자동으로 가장 먼저 /login 으로 이동
    },
    {
        path: '/login',
        component: LoginComponent, // /login  호출할때 불러오는 component
    },
    {
        path: '/board',
        component: BoardListComponent,
    },
    {
        path: '/board/create',
        component: BoardCreateComponent,
    },
    {
        path: '/registration',
        component: UserRegistration,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes, 
});

export default router;