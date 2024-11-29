<template>
<!-- header -->
<header>
    <div class="header-container">
        <div class="header-content">
            <button class="btn btn-header btn-bg-black">홈</button>
            <div class="btn-group">
                <button class="btn btn-header btn-bg-black">로그인</button>
                <button class="btn btn-header btn-bg-black">회원가입</button>

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