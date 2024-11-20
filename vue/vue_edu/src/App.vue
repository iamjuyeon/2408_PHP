<template> 
<!-- html -->
<!-- component Event -->
<EventComponent 
    :cnt = "cnt"
    @eventAddCnt = "addCnt"
    @eventAddCntParam = "addCntParam"
    @eventReset = "reset"
    />
<h3>부모쪽 cnt : {{ cnt }}</h3>




<!-- 자식 컴포넌트 호출 -->
<ChildComponent 
    :data = "data"
    :count = "cnt"
>
<!-- 보통 키 이름과 데이터 이름은 똑같다 -->
<hr>
<h3>부모 쪽에서 작성한 것들</h3>
<p>아아아</p>
</ChildComponent>



<!-- 자식 컴포넌트 호출 -->
<BoardComponent />




<hr>
<!-- 리스트 렌더링 -->
<!-- v-for -->
<!-- 단순 반목 -->
<div v-for="val in 5" :key="val">
    <p>{{ val }}</p>
</div>
<hr>

<!-- 별 찍기? -->
<div v-for="star in 6" :key="star">
    <p>*****</p>
</div>


<!-- 구구단 -->
<!-- <div v-for="x in 9" :key="x++">
    <p>🍅🍅🍅{{ x }}단🍅🍅🍅</p>
    <div v-for="y in 9" :key="y">
        <p>{{ x }} X {{ y }} ={{ x*y }} </p>
    </div>
</div> -->
<hr>

<!-- foreach -->
<div v-for="(item, key) in data" :key="item">
<p>{{ `${key}번째 ${item.name} - ${item.age} - ${item.gender}` }}</p>
<!-- <p>{{  item.name + '-' + item.age + '-' + item.gender }}</p> -->
</div>
<button @click="data.pop">둘리삭제</button>


<!-- v-if -->
<h1 v-if="cnt >= 5">5보다 크다</h1>
<h1 v-if="cnt === 7">러키비키자냐⭐⭐</h1>
<h1 v-else-if="cnt < 0">음수입니다</h1>
<h1 v-else>나머지</h1>

<button @click="addCnt">증가</button>
<button @click="disCnt">감소</button>
<hr>


<!-- v-show -->
<h1 v-setInterval="flgshow">브이쇼</h1>
<button @click="flgshow = !flgshow">브이쇼 토글</button>





<!-- reactive -->
<hr>
<h2>*이름 : {{ userInfo.name }}</h2>
<h2 :class="ageBlue">*나이 : {{ userInfo.age }}</h2>
<h2>*성별 : {{ userInfo.gender }}</h2>
<button @click="changeName">이름 변경</button>
<button @click="changeAgeBlue">나이 색깔 변경</button>
<hr>

<input type="text" v-model="transgender"> 
<button @click="userInfo.gender = transgender">성별 변경</button>
<p>{{  transgender }}</p>



</template>





<script setup> //javascript
import BoardComponent from './components/BoardComponent.vue';
import ChildComponent from './components/ChildComponent.vue';
import EventComponent from './components/EventComponent.vue';

import { reactive, ref } from 'vue';


// -------foreach---------
const data = reactive(
    [
        {name : '홍길동', age : 20, gender : '남자'}
        ,{name : '희동이', age : 12, gender : '여자'}
        ,{name : '둘리', age : 40, gender : '수컷'}
    ]);




// setInterval
(() => {
    setInterval(() => {
        flgshow.value = !flgshow.value
    }, 500);
});



//---------v-show---------
const flgshow = ref(true);


//-------성별 바꾸기 input -------
const transgender = ref('');



//---------특정 객체 색깔 변경---------
const ageBlue = ref('');
function changeAgeBlue() {
    ageBlue.value = 'blue';
}

// -------------reactive-------------
const cnt = ref(0); //ref 객체, 객체의 value 프로퍼티에 저장되어 있음
const userInfo = reactive({
    name: '임꺽정'
    ,age: 20
    ,gender:'남자'
})

function changeName() {
    userInfo.name = '갑순이';
}

//-------------ref-------------
//숫자 증가 감소 버튼
const addCnt = () => {
    cnt.value++; // ref 객체의 value 프로퍼티에 접근
}

const disCnt = () => {
    cnt.value--;
}

//2씩 증가하는 파라미터 함수
function addCntParam(num) {
    cnt.value += num;
}

function reset(num) {
    cnt.value = num;
}

</script>




<style scoped>
/* css */
    #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
    }

.blue {
    color : #0000ff;
}



</style>
