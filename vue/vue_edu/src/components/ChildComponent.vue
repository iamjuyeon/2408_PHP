<template>
    <!-- slot -->
    <slot></slot>
    <h1>ChildComponent</h1>
    <!-- props -->
    <div style="color: blue;" v-for="item in props.data" :key="item">
        <span>{{ item.name }}</span>
    </div>
    <p>{{ props.count }}</p>
    

</template>




<script setup>
//******props******** */
import { defineProps } from 'vue';

const props = defineProps({
    'data': Array
    ,'count': Number //데이터 타입 적기
});


</script>

<style>

</style>