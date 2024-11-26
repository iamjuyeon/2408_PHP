<template>
<!-- 리스트 -->
<div class="board-list-box">
    <div v-for="item in boardList" :key="item"  @click="openModal" class="item">
        <img :src="item.img" alt="">
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
import { computed, onBeforeMount, ref } from 'vue';
import { useStore } from 'vuex';
const store = useStore();

const boardList = computed(() => store.state.board.boardList);
//boardlist 가 computed객체라서 length 못함 -> 뭔말이냐 이게

// *****비포 마운트 처리*****
onBeforeMount(() => {
    if(store.state.board.boardList.length < 1) {

    }
    store.dispatch('board/getBoardListPagenation');//액션메소드
})


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