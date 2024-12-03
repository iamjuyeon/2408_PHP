import { createRouter, createWebHistory } from "vue-router";
import LoginComponent from "../views/components/auth/LoginComponent.vue";
import BoardListComponent from "../views/components/board/BoardListComponent.vue";
import BoardCreateComponent from "../views/components/board/BoardCreateComponent.vue";
import UserRegistrationComponent from "../views/components/users/UserRegistrationComponent.vue";
import { useStore } from 'vuex';

const chkAuth = (to, from, next) => {
    const store = useStore();

    //로그인 했을때
    const authFlg = store.state.user.authFlg;
    // 로그인 안했을 때
    const noAuthPassFlg = (to.path === '/' || to.path ==='/login' || to.path === 'registration');

    if(authFlg && noAuthPassFlg) {
        //둘다 true -> 보드로 이동
        next('/boards');
    } else if(!authFlg && !noAuthPassFlg) {
        next('/login');
    } else {
        next();
    }
}

const routes = [
    //가장먼저 login화면 으로 연결
    {
        path: '/',
        redirect: '/login',
        beforeEnter: chkAuth,
    },
    //login 호출하면 login 화면으로 이동
    {
        path: '/login',
        component: LoginComponent,
        beforeEnter: chkAuth,
    },
    //board list 페이지로 이동
    {
        path: '/boards',
        component: BoardListComponent,
        beforeEnter: chkAuth,
    },
    //board create 페이지로 이동
    {
        path: '/boards/create',
        component: BoardCreateComponent,
        beforeEnter: chkAuth,
    },
    //회원가입 페이지로 이동
    {
        path: '/registration',
        component: UserRegistrationComponent,
        beforeEnter: chkAuth,
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;