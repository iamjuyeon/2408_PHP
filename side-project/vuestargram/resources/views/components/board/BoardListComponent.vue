<template>
<!-- 리스트 -->
<div class="board-list-box">
    <div v-for="item in boardList" :key="item"  @click="openModal(item.board_id)" class="item">
        <img :src="item.img" alt="" width="20%">
    </div>

</div>

<!-- 상세모달 -->
<div v-show="modalFlg" class="board-detail-box">
    <div v-if="boardDetail" class="item">
        <img :src="boardDetail.img" alt="" width="20%">
        <hr>
        <p>{{ boardDetail.content }}</p>
        <hr>
        <div class="etc-box">
            <span>작성자 : {{ boardDetail.user.name }}</span>
            <button @click="closemodal" class="btn btn-submit" >닫기</button>
        </div>
    </div>
</div>

</template>


<script setup>
import { computed, onBeforeMount, ref } from 'vue';
import { useStore } from 'vuex';
const store = useStore();

//****보드 상세 정보****
const boardDetail = computed(() => store.state.board.boardDetail);


//****보드 리스트 **** */
const boardList = computed(() => store.state.board.boardList);
//boardlist 가 computed객체라서 length 못함 -> 뭔말이냐 이게

// *****비포 마운트 처리*****
onBeforeMount(() => {
    if(store.state.board.boardList.length < 1) {

        store.dispatch('board/boardListPagenation');//액션메소드
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

        //2초마다 스크롤 이벤트 실행
        // setTimeout(() => {
        //     store.commit('board/setControllFlg', true);
        // }, 2000);
    }
}

window.addEventListener('scroll', boardScrollEvent);



//*********모달 관련**********
//모달 창 닫기(board 들어갔을 때 모달창 안뜨게)
const modalFlg = ref(false);

//모달창 닫기 버튼
const closemodal = () => {
    
    modalFlg.value = false; //false 하면 모달창 닫아짐
}
//모달창 열기
const openModal = (id) => {
    store.dispatch('board/showBoard', id);
    modalFlg.value = true; 
}

</script>


<style>
@import url('../../../css/boardList.css');
</style>