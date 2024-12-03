<template>
    <div class="form-box">
        <p class="from-title">LOGIN</p>
        <input v-model="userInfo.account" type="text" name="account" placeholder="아이디">
        <input v-model="userInfo.password" type="password" name="password" placeholder="비밀번호">
        <button @click="$store.dispatch('user/login', userInfo)" class="btn btn-submit btn-bg-black">LOGIN</button>
    </div>
</template>

<script setup>

import { reactive } from 'vue';

const userInfo = reactive({
    account:''
    ,password:''
    ,
})
</script>
<style>

</style>