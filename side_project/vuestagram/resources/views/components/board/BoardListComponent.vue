<template>
    <!-- 리스트 -->
    <div class="board-list-box">
        <div @click="openModal" class="item">
            <img src="/img/1.jpg" alt="">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/3.jpg" alt="">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/5.jpg" alt="">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/6.jpg" alt="">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/7.jpg" alt="">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/8.jpg" alt="">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/9.jpg" alt="">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/10.jpg" alt="">
        </div>
        <div @click="openModal" class="item">
            <img src="/img/11.jpg" alt="">
        </div>


    </div>

    <!-- 상세모달 -->
    <div v-show="modalFlg" class="board-detail-box">
        <div class="item">
            <img src="/img/1.jpg" alt="">
            <hr>
            <p>내용내용</p>
            <hr>
            <div class="etc-box">
                <span>작성자 : 배현진</span>
                <button @click="closeModal">닫기</button>
            </div>
        </div>
    </div>


</template>

<script setup>

import { ref } from 'vue';

// -----모달 관련------------
const modalFlg = ref(false);
const openModal = () => {
    modalFlg.value = true;
}
const closeModal = () => {
    modalFlg.value = false;
}


</script>

<style>
@import url('../../../css/boardList.css');
</style>