<template>
<div class="form-box">
    <h3 class="form-data">글 작성</h3>
    <!-- 미리보기할 이미지 -->
    <img :src="preview" alt="">
    <textarea v-model="boardInfo.content" name="content" placeholder="내용을 작성해주세요" maxlength="200"></textarea>
    <!-- accept : 유저가 눌렀을때 이미지 파일만 나옴 -->
    <input @change="setFile" type="file" name="file" accept="image/*">
    
    <button @click="$store.dispatch('board/storeBoard', boardInfo)" class="btn btn-bg-black btn-submit">완료</button>
    
    <!-- $router : route에 직접적으로 바로 연결 -->
    <!-- back() : 브라우저의 이전 버튼 -->
    <button @click="$router.push('/boards')" class="btn btn-submit">취소</button>
</div>
</template>

<script setup>
import { reactive, ref } from 'vue';

const boardInfo = reactive({
    content: '',
    file: null
});

//파일 미리보기
const preview = ref('');

const setFile = (e) => {
    boardInfo.file = e.target.files[0]; 
    preview.value = URL.createObjectURL(boardInfo.file);//ref 객체로 선언하기 때문에 value로 접근
}


</script>

<style>

</style>