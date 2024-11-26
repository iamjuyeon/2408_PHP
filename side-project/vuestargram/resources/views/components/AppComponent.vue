<template>
<!-- header -->
<header>
    <div class="header-container">
        <div class="header-content">
            <div class="title">
                <img src="/heart_icon.png" alt="" class="img-logo">
                <a href=""><h1>VueStargram</h1></a>
            </div>
            <div class="btn-group">
                <!-- a태그는 서버로 요청이 감 -->
                <div v-if="!$store.state.user.authFlg">
                    <router-link to="/login"><button class="btn btn-header btn-bg-black">로그인</button></router-link>
                    <router-link to="/registration"><button class="btn btn-header btn-bg-black">회원가입</button></router-link>
                </div>
                <div v-else>
                    <button @click="$store.dispatch('user/logout')" class="btn btn-header btn-bg-black">로그아웃</button> 
                </div>
            </div>
        </div>
    </div>
</header>

<!-- main -->
<main>
    <UserInfoComponent v-if="$store.state.user.authFlg" />
    <div class="container">
        <router-view></router-view>
    </div>
</main>


<!-- footer -->
<footer>
    <p>🥳welcome to vue world🥳</p>
</footer>



</template>





<script setup>
import UserInfoComponent from './users/UserInfoComponent.vue';

</script>





<style>
@import url('../../css/common.css'); /* scoped 가 적용이 안되고 무조건 전역*/

</style>

