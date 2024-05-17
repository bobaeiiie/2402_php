<template>
  <Transition name="container">
    <div class="bg_black" v-if="data.flgModal">
      <div class="bg_white" >
        <img :src="data.product.img">
        <h3>{{ data.product.productName }}</h3>
        <p>{{ data.product.productContent }}</p>
        <p>{{ data.product.price }} 원</p>
        <p>총액 : {{ data.product.price * cnt }} 원</p>
        <input type="number" min="1" v-model="cnt">
        <br><br>
        <button @click="close">X</button>
      </div>
    </div>
  </Transition>
</template>

<!-- -------------------------------------------------------------------------- -->

<script setup>
import { defineEmits, defineProps, ref } from 'vue';

const data = defineProps({
    'products': Array,
    'product': Object,
    'flgModal': Boolean
});

const emit = defineEmits(['myCloseModal']);
// 총액 처리 부분

const cnt = ref(1);

function close() {
  cnt.value =1;
  emit('myCloseModal', data.product.productName);
}


console.log(data);
</script>

<!-- -------------------------------------------------------------------------- -->

<style>
    .container-enter-from {
      transform: translateX(-2133px);
    }
    .container-enter-active {
      transition: all 1s;
    }
    .container-enter-to {
      transform: translateX(0px);
    }

    .container-leave-from {
      transform: translateX(0px);
    }
    .container-leave-active {
      transition: all 1s;
    }
    .container-leave-to {
      transform: translateX(2133px);
    }
</style>
