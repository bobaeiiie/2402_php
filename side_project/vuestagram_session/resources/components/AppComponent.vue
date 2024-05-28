<template>
  <!-- header -->
  <header>
    <div class="header-container">
      <div class="header-content">
        <div class="title">
          <router-link to="/"><h1>Vuestagram</h1></router-link>
        </div>
        <img class="img-logo" alt="logo" src="/logo.png">
        <div class="btn-group">
          <div v-if="!$store.state.authFlg">
            <button @click="$router.push('/login')" class="btn btn-header btn-bg-black">로그인</button>
            <button @click="$router.push('/registration')" class="btn btn-header btn-bg-white">가입하기</button>
          </div>
          <div v-else>
            <button @click="$store.dispatch('logout')" class="btn btn-header btn-bg-black">로그아웃</button>
          </div>
        </div>
      </div>
    </div>
  </header>
  <hr>

  <!-- Main -->
  <main>
    <UserInfoComponent />
    <div class="container">
      <router-view></router-view>
    </div>
  </main>

  <!-- footer -->
  <footer>
    <p>ⓒ 2024. Meerkat All rights reserved.</p>
  </footer>
</template>

<script setup>
import UserInfoComponent from './UserInfoComponent.vue';
</script>

<style>
@import url('../css/common.css');
</style>
