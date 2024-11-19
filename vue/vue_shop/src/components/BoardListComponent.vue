<template>
    <div v-for="item in products" :key="item">
        <h2 @click="openDetailModal(item)"> {{ item.productName}}</h2>
        <span> {{ item.productContent }}</span>
        <span> {{ item.productPrice }}원</span>
    </div>

      <!-- detail modal -->
    <transition name="detailModalAnimation">
        <div class="bg-modal-black" v-show="flgDetail">
            <div class="bg-modal-white">
                <h1>{{ detailProduct.productName }}</h1>
                <p>{{ detailProduct.productContent }}</p>
                <p>{{ detailProduct.productPrice }}</p>
                <button @click="closeDetailModal">닫기</button>
            </div>
        </div>
    </transition>
        
</template>

<script setup>
import { computed, ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

const products = computed(() => store.state.board.products);

const flgDetail = ref(false);
const detailProduct = computed(() => store.state.board.detailProduct);  

const openDetailModal = (item) =>{
    store.commit('board/setDetailProduct', item);
    flgDetail.value = true;
}
const closeDetailModal = () => {
    flgDetail.value = false;
}
</script>


<style>
.bg-modal-black {
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.7);
    position: fixed;
    top: 0;
    left: 0;
}

.bg-modal-white {
    background-color: white;

    width: 80%;
    max-width: 300px;
    margin: 20px auto;
    padding: 20px;
}

.detailModalAnimation-enter-from { 
    opacity: 0;
} /*진입시작*/

.detailModalAnimation-enter-active {
    transition: 1s ease;
}/*실행중*/

.detailModalAnimation-enter-to {
    opacity: 1;
}/*실행끝에*/ 


.detailModalAnimation-leave-from {
    transform: translateX(0px);
}

.detailModalAnimation-leave-active {
    transition: all 4s;
}

.detailModalAnimation-leave-to {
    transform: translateX(4000px);
}
</style>