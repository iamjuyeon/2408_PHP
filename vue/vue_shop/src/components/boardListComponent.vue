<template>
<hr>
<div v-for="item in product" :key="item">
    <h1 @click="openDetailModal(item)">{{ item.productName }}</h1>
    <!-- @click="openDetailModal(item)" 여기 안에 들어 있는 내용 -->
    <!-- {productName: '바지', productPrice: 38000, productContent: '매우 아름다운 바지'} -->
    <!-- 저 내용이 모달창 누를때마다 출력 -->
    <h3 style="color: red;">{{ item.productContent }}</h3>
    <p>가격 : {{ item.productPrice }} 원</p>
</div>


<!-- 모달 -->
<Transition name="detailModalAnimation">
    <div class="bg-modal-black" v-show="flgDetail">
        <div class="bg-modal-white">
            <h3>{{ detailProduct.productName }}</h3>
            <p>{{ detailProduct.productContent }}</p>
            <p>{{ detailProduct.productPrice }}</p>
            <button @click="closeDetailModal">닫기</button>
        </div>
    </div>
</Transition>


</template>


<script setup>
import { computed, ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

//반응형 데이터로 다루기 위해 computed 이용
const product = computed(() => store.state.board.product);

//상세 모달 제어
const flgDetail = ref(false);

const detailProduct = computed(() => store.state.board.detailProduct);



const openDetailModal = (item) => {
    store.commit('board/setDetailProduct', item);
    flgDetail.value = true;
}

const closeDetailModal= () => {
    flgDetail.value = false;
}


</script>



<style>
/* 모달창 스타일 */
.bg-modal-black {
    height: 100vh;
    width: 100vw;
    background-color: rgba(0, 0, 0, 0.4);
    position: fixed; /*absolute상관없음*/
    top: 0;
    left: 0;
}

.bg-modal-white {
    width: 80%;
    max-width: 300px;
    background-color: white;
    margin: 20px auto;
    padding: 20px;
}

/* 모달창 이벤트 - 모달창이 열리거나 닫힐때 효과 설정 */
.detailModalAnimation-enter-from {
    opacity: 0; 
}
.detailModalAnimation-enter-active {
    transition: 1s ease;
}
.detailModalAnimation-enter-to {
    opacity: 1;
}
.detailModalAnimation-leave-from {
    transform: translateX(0px);
}
.detailModalAnimation-leave-active {
    transition: all 5s;
}
.detailModalAnimation-leave-to {
    transform: rotate(180deg);
    width: 0;
    height: 0;
}
</style>