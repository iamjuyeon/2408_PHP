<template>
    <div class="form-box">
        <p class="form-title">로그인</p>
        <!-- 양방향 데이터 바인딩 할 것들 (v-model) -->
        <input v-model="userInfo.account" type="text" name="account" placeholder="아이디를 입력하세요">
        <input v-model="userInfo.password" type="password" name="password" placeholder="비밀번호를 입력하세요">
        <button @click="$store.dispatch('user/login', userInfo)" class="btn btn-submit btn-bg-black">로그인</button>
        <!--@click="$store.dispatch('user/login', userInfo)" : 액션 메소드 실행 -->
    </div>
</template>


<script setup>
import { reactive } from 'vue';

const userInfo = reactive({
    account: '',
    password: '',
});


</script>



<style>


</style>