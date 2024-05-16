<template>
  <div class="bg_black" v-if="flgModal">
    <div class="bg_white" >
      <img :src="data.product.img">
      <h3>{{ data.product.productName }}</h3>
      <p>{{ data.product.productContent }}</p>
      <p>{{ data.product.price }} 원</p>
      <!-- <button @click="flgModal = !flgModal">X</button> -->
    </div>
  </div>
</template>

<!-- -------------------------------------------------------------------------- -->

<script setup>
import { defineProps } from 'vue';

const data = defineProps({
    'products': Array,
    'product': Object,
    'flgModal': Boolean
});

console.log(data);

</script>

<!-- -------------------------------------------------------------------------- -->

<style>
    
</style>
