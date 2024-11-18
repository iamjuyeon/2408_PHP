<template>
<hr>
<p>component------보드</p>

<!-- method 핸들러 -->
<p>버튼</p>
<button @click="addCnt">{{ cnt }}</button>
<br>
<!-- 더쉽게(인라인 핸들러, 현업에서 잘 사용 안함) -->
<p>마우스 엔터</p>
<h1 @mouseenter="mouse++">{{ mouse }}</h1>

<hr>
<!-- 문자 깜빡깜박 setInterval -->
<h1>문자가 깜빡깜박</h1>

<hr>

<!-- watchers -->
<p>전화번호를 입력하세요</p>
<input type="text" v-model="tel"> 

<!-- 양식에 맞으면 o, 틀리면 x -->
<span :style="color">{{ msg }}</span>


</template>



<script setup>
import { ref, watch } from 'vue';

// *******watchser*********
const tel = ref('');
const msg = ref('X');
const color = ref('color: red;');


watch(tel, (val) => { //tel의 변화를 감지하고 있다가, 변화를 감지하면 val이 tel의 값을 가져옴
    const regex = /^[0-9]{10, 11}$/;
    if(!regex.test(val)) {
        msg.value = 'X';
        color.value = 'color: red;';
    } else {
        msg.value = 'O';
        color.value = 'color: blue;';
    }
});



const mouse = ref(0);
const cnt = ref(0);
const addCnt = () => {
    cnt.value++;
}


</script>




<style>


</style>