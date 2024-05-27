<template>
    <!-- header -->
    <header>
        <div class="header-container">
            <div class="header-content">
                <div class="title">
                    <router-link to="/board">
                        <h1>Vuestagram</h1>
                    </router-link>
                </div>
                <img class="img-logo" src="/logo.png" alt="">
                <div class="btn-group">
                    <div v-if="!$store.state.authFlg">
                        <router-link to="/login">
                            <button class="btn btn-header btn-bg-black">로그인</button>
                        </router-link>
                        <router-link to="/signup">
                            <button class="btn btn-header btn-bg-white">가입하기</button>
                        </router-link>
                    </div>
                    <div v-else>
                        <button @click="$store.dispatch('logout')" class="btn btn-header btn-bg-black">로그아웃</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- main -->
    <main>
        <User-info-component v-if="$store.state.authFlg"/>
        <div class="container">
            <router-view></router-view>
        </div>
    </main>
    <!-- footer -->
    <footer>
        <p>© 2024. BOBAE All rights reserved.</p>
    </footer>
</template>

<!-- -------------------------------------------------------------------------- -->

<script setup>
import UserInfoComponent from './UserInfoComponent.vue';
</script>

<!-- -------------------------------------------------------------------------- -->

<style>
    @import url(../css/common.css);
</style>