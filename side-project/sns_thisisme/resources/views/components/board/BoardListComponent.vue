<template>
<!-- 게시판 리스트 -->
<div class="board-list-box">
    <div v-for="item in boardList" :key="item" @click="openModal(item.board_id)" class="item">
        <img :src="item.img" alt="" width="20%">
    </div>
</div>
<!-- <div  class="menu-bar">

    <button>🙍</button>
    <router-link to="/boards/create"><button>✍📃</button></router-link>
    <button>🔍</button>

</div> -->

<!-- 상세 모달 -->
<div v-show="modalFlg"  class="board-detail-box">
    <div v-if="boardDetail" class="item">
        <img :src="boardDetail.img" alt="" width="20%">
        <hr>
        <div class="etc-box">
            <p>날짜 : {{ boardDetail.created_at }}</p>
            <p>작성자 : {{ boardDetail.user.name }}</p>
            <p>{{ boardDetail.content  }}</p>
            <button @click="closeModal" class="btn btn-submit">닫기</button>
        </div>
    </div>

</div>





</template>


<script setup>
import { useStore } from 'vuex';
import { ref, computed, onBeforeMount } from 'vue';


//*********모달 관련**********
//모달 창 닫기(board 들어갔을 때 모달창 안뜨게)
const modalFlg = ref(false);

//모달창 닫기 버튼
const closeModal = () => {
    modalFlg.value = false; //false 하면 모달창 닫아짐
}
//모달창 열기
const openModal = (id) => {
    store.dispatch('board/showBoard', id);
    modalFlg.value = true; 
}

//********게시판 관련********
const store = useStore();
const boardDetail = computed (() => store.state.board.boardDetail);

//보드 리스트
const boardList = computed(() => store.state.board.boardList);

//비포 마운트 처리
onBeforeMount(() => {
    if(store.state.board.boardList.length < 1 ) {
        store.dispatch('board/boardListPagenation');
    }
})

// *******스크롤 이벤트 ********
const boardScrollEvent = () => {
    if(store.state.board.controllFlg) {
        //문서 총 길이
        const docHeight = document.documentElement.scrollHeight;
        // console.log('문서 y축 :' + docHeight); //문서 기준 y축 총 길이
    
        const winHeight = window.innerHeight;
        // console.log('윈도우 y축 : ' +  winHeight); //윈도우 y축 총 길이
    
        const nowHeight = window.scrollY;
        // console.log('현재 Y축 : ' + nowHeight); //현재 스크롤 위치
    
        const viewHeight = docHeight - winHeight;
        // console.log('최대 스크롤 y축 : ' + viewHeight); //끝까지 스크롤 했을때 
    
        // 스크롤이 끝까지 다 내려오면 작동
        if(viewHeight <= nowHeight) {
            store.dispatch('board/boardListPagenation');
            console.log('스크롤 동작');

        }
    }
}
window.addEventListener('scroll', boardScrollEvent);

</script>


<style>
@import url('../../../css/boardList.css');
</style>