<template>
    <!--    header    -->
    <header>
        <div class="header-container">
            <div class="header-content">
                <div class="title">
                    <a href=""><h1>Vuestagram</h1></a>
                </div>
                <img src="/join.png" alt="" class="img-logo">
                <div class="btn-group">
                    <router-link to="/login"><button class="btn btn-header btn-bg-black">로그인</button></router-link>
                    <router-link to="/registration"><button class="btn btn-header btn-bg-white">회원가입</button></router-link>
                </div>
            </div>
        </div>
    </header>

    <!--   main    -->
    <main>
        <UserInfoComponent />
        <div class="container">
            <router-view></router-view>
        </div>
    </main>
    <!-- footer -->
     <footer>
        <p> ⓒ2024. Hyunjin All rights reserved</p>
     </footer>
</template>

<script setup>
import UserInfoComponent from './user/UserInfoComponent.vue'
</script>

<style>
@import url('../../css/common.css');
</style>