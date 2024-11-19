<template>
    <p>자식쪽 cnt : {{ props.cnt }}</p>
    <button @click="$emit('eventAddcnt')">자식쪽증가</button>
    <button @click="$emit('eventAddCntParam',2)">자식쪽에서 2씩증가</button>

    <button @click="$emit('eventResetCnt')">자식쪽 초기화</button>




</template>




<script setup>
import {defineProps} from 'vue';

const props = defineProps({
    'cnt' : Number
});


</script>




<style>
    
</style>