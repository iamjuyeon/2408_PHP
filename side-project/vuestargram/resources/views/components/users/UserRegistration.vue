<template>
<div class="form-box">
    <h3 class="form-title">💜회원가입💜</h3>
    <input type="text" name="account" placeholder="아이디" autocomplete="off">
    <input type="password" name="password" placeholder="비밀번호" autocomplete="off">
    <!-- autocomplete="off" : 자동완성을 차단하게 -->
    <input type="password" name="password_chk" placeholder="비밀번호 확인" autocomplete="off">
    <input type="text" name="name" placeholder="이름" autocomplete="off">
    
    <!-- 성별 체크 박스 -->
    <div class="radio-box">
        <div>
            <label for="male">남자</label>
            <input type="radio" name="gender" id="male" value="0">
        </div>
        <div>
            <label for="female">여자</label>
            <input type="radio" name="gender" id="female" value="1">
        </div>

    </div>
    <!-- 프로필 이미지 설정 -->
    <input type="file" name="profile" accept="image/*">
    <hr>
    <button class="btn btn-submit btn-bg-black">회원가입</button>
    <button @click="$router.replace('/login')" class="btn btn-submit">취   소</button>
    <!-- push : 이력을 남기면서 이동? -->
    <!-- replace : 이력을 남기지 않고 이동 -->
</div>


</template>


<script setup>


</script>


<style>


</style>