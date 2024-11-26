import { createWebHistory, createRouter } from "vue-router";
import LoginComponent from "../views/components/auth/LoginComponent.vue";
import BoardListComponent from "../views/components/board/BoardListComponent.vue";
import BoardCreateComponent from "../views/components/board/BoardCreateComponent.vue";
import UserRegistration from "../views/components/users/UserRegistration.vue";
import NotFoundComponent from "../views/components/users/NotFoundComponent.vue";
import { useStore } from 'vuex';

//to : 내가 이동할 path
//from : 내가 이 route에 오기 전에 정보
//next : 처리를 다 끝내고 다음 내가 후속처리할 정보
const chkAuth = (to, from, next) => {
    const store = useStore();
    // 로그인 여부 플래그
    const authFlg = store.state.user.authFlg;
    //로그인 안했을 때 이동 경로
    const noAuthPassFlg = (to.path === '/' || to.path ==='/login' || to.path === '/registration'); // 비로그인시 접근 가능 플래그

    if(authFlg && noAuthPassFlg) {
        //둘다 true -> 보드로 이동
        next('/boards');//인증된 유저가 비인증으로 이동할 수 있는 페이지에 접근할 경우 board로 이동
    } else if(!authFlg && !noAuthPassFlg) {
        next('/login');
        //인증이 안된 유저가 비인증으로 접근할 수 없는 페이지에 접근할 경우 login으로 이동
    } else {
        next(); //그외는 접근 허용 원래 가려고 했던 경로로 이동
    }
}
const routes = [
    {
        path: '/',
        redirect: '/login', //자동으로 가장 먼저 /login 으로 이동
        beforeEnter: chkAuth,
    },
    {
        path: '/login',
        component: LoginComponent, // /login  호출할때 불러오는 component
        beforeEnter: chkAuth,
    },
    {
        path: '/boards',
        component: BoardListComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/boards/create',
        component: BoardCreateComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/registration',
        component: UserRegistration,
        beforeEnter: chkAuth,
    },
    //가장 마지막에 있어야한다
    {
        path: '/:catchAll(.*)',
        component: NotFoundComponent,
    }

];


const router = createRouter({
    history: createWebHistory(),
    routes, 
});

export default router;