<template>
<!-- header -->
<header>
    <div class="header-container">
        <div class="header-content">
            
                <button class="btn btn-header btn-bg-black">홈</button>
            
            <div class="btn-group">
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
    <div class="container">
        <router-view></router-view>
    </div>
</main>


<!-- footer -->
<footer>
    <p>안녕하세요</p>
</footer>
</template>

<script setup>

</script>

<style>
@import url('../../css/common.css');
</style>