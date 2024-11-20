<template>
    <div class="form-box">
        <h3 class="form-title">글 작성</h3>
        <!-- 미리보기 할 이미지 -->
        <img src="" alt="">
        <textarea name="content" placeholder="내용을 작성해주세요" maxlength="200"></textarea>
        <input type="file" name="file" accept="image/*">
        <!-- accept : 유저가 눌렀을때 이미지 파일만 나옴 -->
        <button class="btn btn-bg-black btn-submit">완료</button>
        
        <!-- $router : route에 직접적으로 바로 연결 -->
        <!-- back() : 브라우저의 이전 버튼 -->
        <button @click="$router.back()" class="btn btn-submit">취소</button>
    </div>

</template>


<script setup>


</script>


<style>


</style>