<template>
    <form class="form-box" id="boardCreateForm">
      <h3 class="form-title">글 작성</h3>
      <img src="">
      <textarea name="content" placeholder="내용을 적어주세요." max="200"></textarea>
      <input type="file" name="img" accept="image/*">
      <button @click="$router.replace('/board')" type="button" class="btn btn-submit btn-bg-black">작성</button>
      <button @click="$router.back()" type="button" class="btn btn-submit">취소</button>
    </form>
  </template>
  <script setup>
  </script>
  <style>
  </style>
