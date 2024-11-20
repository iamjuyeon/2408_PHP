<template>
  <img alt="Vue logo" src="./assets/logo.png">

  <!-- commit('모듈명', '메소드명') -->
  <!-- <button @click="store.commit('board/addCount')">증가</button>  -->


<h1>알리알리 알리 쇼핑</h1>

<!-- 자식 컴포넌트 -->
<boardListComponent />





</template>

<script setup>

import boardListComponent from './components/boardListComponent.vue';


// const product = reactive(store.state.board.product);



</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
