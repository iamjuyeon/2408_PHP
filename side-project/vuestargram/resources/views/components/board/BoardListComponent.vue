<template>
<!-- 리스트 -->
<div class="board-list-box">
    <div @click="openModal" class="item">
        <img src="/img/me.jpg" alt="">
    </div>
    <div @click="openModal" class="item">
        <img src="/img/PowerShell.jpg" alt="">
    </div>
    <div @click="openModal" class="item">
        <img src="/img/tim berners lee(html).jpg" alt="">
    </div>
    <div @click="openModal" class="item">
        <img src="/img/라스무스 러도프.png" alt="">
    </div>
    <div @click="openModal" class="item">
        <img src="/img/몬티 와이드니어스.png" alt="">
    </div>
    <div @click="openModal" class="item">
        <img src="/img/테일러 오트웰.png" alt="">
    </div>
    <div @click="openModal" class="item">
        <img src="/img/evan you.jpg" alt="">
    </div>
</div>

<!-- 상세모달 -->
<div v-show="modalFlg" class="board-detail-box">
    <div class="item">
        <img src="/img/me.jpg" alt="" width="20%">
        <hr>
        <p>허허허</p>
        <hr>
        <div class="etc-box">
            <span>작성자 : 나요</span>
            <button @click="closemodal" >닫기</button>
        </div>
    </div>
</div>

</template>


<script setup>
import { ref } from 'vue';

//******모달 관련******
//모달 창 닫기(board 들어갔을 때 모달창 안뜨게)
const modalFlg = ref(false);

//모달창 닫기 버튼
const closemodal = () => {
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