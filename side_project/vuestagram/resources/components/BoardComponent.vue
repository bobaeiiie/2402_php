<template>
    <!-- 리스트 -->
    <div class="board-list-box">
        <div v-for="(item, key) in $store.state.boardList" :key="key" class="item">
            <img :src="item.img">
        </div>
    </div>
</template>

<!-- -------------------------------------------------------------------------- -->

<script setup>
import { onBeforeMount } from 'vue';
import store from '../js/store';

onBeforeMount(() => {
    store.dispatch('getBoardList');
});

</script>

<!-- -------------------------------------------------------------------------- -->

<style>
@import url(../css/common.css);
@import url(../css/boardList.css);
</style>