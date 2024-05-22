<template>
    <hr>
    <div class="user-info-box">
        <img :src="$store.state.userInfo.profile">
        <div class="user-info-content">
            <h2>{{ $store.state.userInfo.name }}</h2>
            <h3>작성 글 수 : {{ $store.state.userInfo.boards_count }}</h3>
        </div>
        <router-link to=""><button class="btn btn-submit btn-bg-white">글 작성</button></router-link>
    </div>
    <hr>
</template>

<!-- -------------------------------------------------------------------------- -->

<script setup>

</script>

<!-- -------------------------------------------------------------------------- -->

<style>
@import url('../css/userInfo.css');
@import url(../css/common.css);
</style>