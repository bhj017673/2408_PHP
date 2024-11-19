<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- <h1> {{  count  }}</h1>
  <button @click="store.commit('board/addCount')"></button> -->
  <BoardListComponent />


</template>

<script setup>
import BoardListComponent from './components/BoardListComponent.vue';

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
