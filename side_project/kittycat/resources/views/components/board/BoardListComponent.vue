<template>
    <!-- 리스트 -->
    <div class="board-list-box">
        <div v-for="item in boardList" :key="item" @click="openModal(item.board_id)" class="item">
            <img :src="item.img">
        </div>
    </div>
    <!-- 상세 모달 -->
    <div v-show="modalFlg" class="board-detail-box">
        <div v-if="boardDetail" class="item">
            <img :src="boardDetail.img">
            <hr>
            <p>{{ boardDetail.content }}</p>
            <hr>
            <div class="etc-box">
                <span>Writer : {{ boardDetail.user.name }}</span>
                <button @click="closeModal" class="btn btn-header btn-bg-black">Close</button>
            </div>
        </div>
    </div>
</template>
<script setup>
import { computed, onBeforeMount, ref } from 'vue';
import { useStore } from 'vuex';
const store = useStore();


// 보드 상세 정보 이해불가
const boardDetail = computed(() => store.state.board.boardDetail);

// 보드 리스트 이해불가
const boardList = computed(() => store.state.board.boardList);

// 비포 마운트 처리 이해불가
onBeforeMount(() => {
    
    if(store.state.board.boardList.length < 1) {
        store.dispatch('board/boardListPagination');
    } 
});

// -------------------------------------
// 모달 관련
const modalFlg = ref(false);
const openModal = (id) => {
    // console.log(id);
    store.dispatch('board/showBoard', id);
    modalFlg.value = true;
}
const closeModal = () => {
    modalFlg.value = false;
}
// -------------------------------------
</script>
<style>
@import url('../../../css/boardList.css');
</style>