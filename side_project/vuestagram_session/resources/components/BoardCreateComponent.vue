<template>

  <form class="form-box" id="boardCreateForm">
    <h3 class="form-title">글 작성</h3>
    <img :src="preview">
    <textarea v-model="boardInfo.content" name="content" placeholder="내용을 적어주세요." max="200"></textarea>
    <input @change="setFile" type="file" name="img" accept="image/*">
    <button @click="$store.dispatch('storeBoard', boardInfo)" type="button" class="btn btn-submit btn-bg-black">작성</button>
    <button @click="$router.back()" type="button" class="btn btn-submit">취소</button>
  </form>

</template>
<script setup>

import { reactive, ref } from 'vue';

const boardInfo = reactive({
    content: '',
    img: null,
});

const preview = ref('');

function setFile(e) {
    // 저장
    boardInfo.img = e.target.files[0];
    // 화면 표시
    preview.value = URL.createObjectURL(boardInfo.img);
}

</script>
<style>
</style>
