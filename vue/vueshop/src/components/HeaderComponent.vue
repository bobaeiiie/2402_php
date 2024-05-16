<template>
    <div class="nav">
        <a href="#" v-for="item in data.navList" :key="item.navName">{{ item.navName }}</a>
    </div>
</template>

<!-- -------------------------------------------------------------------------- -->

<script setup>
import { defineProps } from 'vue';

const data = defineProps({
    'navList': Array
});

</script>

<!-- -------------------------------------------------------------------------- -->

<style>
    
</style>

