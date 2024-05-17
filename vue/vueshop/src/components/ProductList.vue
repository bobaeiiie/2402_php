<template>
  <div>
    <!-- <slot></slot> -->
    <div v-for="item in data.products" :key="item.productName">
      <h4 @click="$emit('myOpenModal', item)">{{ item.productName }}</h4>
      <p>{{ item.price }} 원</p>
      <hr>
    </div>
    <ProvideTest />
  </div>
</template>

<!-- -------------------------------------------------------------------------- -->

<script setup>
import { defineProps } from 'vue';
import ProvideTest from './ProvideTest.vue';

const data = defineProps({
    'products': Array,
    // 'product': Object,
    // 'flgModal': Boolean
})
</script>

<!-- -------------------------------------------------------------------------- -->

<style>
    
</style>