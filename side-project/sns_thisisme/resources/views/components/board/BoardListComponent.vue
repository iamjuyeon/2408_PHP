<template>
<!-- 게시판 리스트 -->
<div class="board-list-box">
    <div @click="openModal" class="item">
        <img src="../../../../public/img/키키핑.jpg" alt="" width="20%">
    </div>
</div>

<!-- 상세 모달 -->
<div v-show="modalFlg"  class="board-detail-box">
    <div class="item">
        <img src="../../../../public/img/키키핑.jpg" alt="" width="20%">
        <hr>
        <div class="etc-box">
            <p>날짜 : 2024-11-29</p>
            <p>작성자 : 김아무개</p>
            <p>오늘 춥다</p>
            <button @click="closeModal" class="btn btn-submit">닫기</button>
        </div>
    </div>

</div>



</template>


<script setup>

import { ref } from 'vue';


//*********모달 관련**********
//모달 창 닫기(board 들어갔을 때 모달창 안뜨게)
const modalFlg = ref(false);

//모달창 닫기 버튼
const closeModal = () => {
    
    modalFlg.value = false; //false 하면 모달창 닫아짐
}
//모달창 열기
const openModal = () => {
    modalFlg.value = true; 
}
</script>


<style>
@import url('../../../css/boardList.css');
</style>