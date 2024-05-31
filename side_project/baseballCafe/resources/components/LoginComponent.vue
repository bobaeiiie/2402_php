<template>
    <main>
      <div class="main-container">
        <div class="side-container">
          <div class="login-container">
            <form class="form-box" id="loginForm">
              <p class="form-title">로그인</p>
              <input type="text" name="account" id="account" placeholder="아이디">
              <input type="password" name="password" id="password" placeholder="비밀번호" autoComplete="off">
              <button @click="$store.dispatch('login')" type="button" class="btn btn-submit btn-bg-black">로그인</button>
            </form>
          </div>
        </div>
      </div>
    </main>
  </template>

<script setup>
</script>

<style>
</style>
