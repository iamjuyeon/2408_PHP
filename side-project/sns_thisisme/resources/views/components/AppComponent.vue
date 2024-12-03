<template>
<!-- header -->
<header>
    <div class="header-container">
        <div class="header-content">
            
                <button class="btn btn-header btn-bg-blue">홈</button>
            
            <div class="btn-group">
                <div v-if="!$store.state.user.authFlg">
                    <router-link to="/login"><button class="btn btn-header btn-bg-blue">로그인</button></router-link>
                    <router-link to="/registration"><button class="btn btn-header btn-bg-blue">회원가입</button></router-link>
                </div>
                <div v-else>
                    <button @click="$store.dispatch('user/logout')" class="btn btn-header btn-bg-blue">로그아웃</button>
                    <router-link to="/boards/create"><button class="btn btn-header btn-bg-blue">작성하기</button></router-link>

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
<!-- <div  class="menu-bar">
    <div v-if="!Store.state.user.authFlg">
    <button>🙍</button>
    <router-link to="/boards/create"></router-link><button>✍📃</button>
    <button>🔍</button>
    </div>
</div> -->
<footer>

    <p>🎈Hello. Welcome to This is me🎈 </p>
</footer>
</template>

<script setup>

</script>

<style>
@import url('../../css/common.css');
</style>