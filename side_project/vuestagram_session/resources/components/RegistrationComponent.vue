<template>
    <form class="form-box" id="registrationForm">
      <h3 class="form-title">회원가입</h3>
      <input type="text" name="account" placeholder="아이디">
      <input type="password" name="password" placeholder="비밀번호" autoComplete="off">
      <input type="password" name="password_chk" placeholder="비밀번호 확인" autoComplete="off">
      <input type="text" name="name" placeholder="이름" autoComplete="off">
      <div class="radio-box">
        <div>
          <label for="male">남자</label>
          <input type="radio" name="name" id="male" value="0">
        </div>
        <div>
          <label for="female">여자</label>
          <input type="radio" name="name" id="female" value="1">
        </div>
      </div>
      <input @change="setFile" type="file" name="img" accept="image/*">
      <hr>
      <button @click="$router.replace('/login')" type="button" class="btn btn-submit btn-bg-black">가입</button>
      <button @click="$router.back()" type="button" class="btn btn-submit">취소</button>
    </form>
  </template>

  <script setup>
  </script>

  <style>
  </style>
