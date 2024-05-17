<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <HeaderComponent :navList="navList"/>
  <!-- <div class="nav">
      <a href="#" v-for="item in navList" :key="item.navName">{{ item.navName }}</a>
  </div> -->
  
  <!-- 상품 리스트 -->
  <ProductList
    :products="products"
    :product="product"
    @myOpenModal="myOpenModal"
  >
  <!-- <h3>부모쪽에서 정의한 슬롯</h3> -->
  </ProductList>
  <div>
    <!-- <div v-for="item in products" :key="item.productName">
      <h4 @click="myOpenModal(item)">{{ item.productName }}</h4>
      <p>{{ item.price }} 원</p>
      <hr>
    </div> -->
    <!-- <div>
      <h4 @click="myOpenModal(products[1])">{{ products[1].productName }}</h4>
      <p>{{ products[1].price }} 원</p>
    </div>
    <div>
      <h4 @click="myOpenModal(products[2])">{{ products[2].productName }}</h4>
      <p>{{ products[2].price }} 원</p>
    </div> -->
  </div>

  <!-- 모달 -->
  <ModalDetail
    :products="products"
    :product="product"
    :flgModal="flgModal" 
    @myCloseModal="myCloseModal"
  />
  <!-- <div class="bg_black" v-if="flgModal">
    <div class="bg_white">
      <img :src="product.img">
      <h3>{{ product.productName }}</h3>
      <p>{{ product.productContent }}</p>
      <p>{{ product.price }} 원</p>
      <button @click="flgModal = !flgModal">X</button>
    </div>
  </div> -->
</template>

<!-- -------------------------------------------------------------------------- -->

<script setup>
import { ref, reactive, provide } from 'vue';
import HeaderComponent from './components/HeaderComponent.vue';
import ModalDetail from './components/ModalDetail.vue';
import ProductList from './components/ProductList.vue';
// ----------------
// 데이터 바인딩
// ----------------
// ref : 타입제한 없이 사용가능하나 일반적으로 string, number, boolean
// 등 기본유형에 대한 반응적 참조를 위해 사용
// import { ref } from 'vue';
// const pants = ref('청바지');
// const price = ref(10000); // 데이터타입 주의
// console.log(pants.value);

// reactive : 객체 타입만 사용 가능하며
// 해당 객체에 대한 반응적 참조를 위해 사용
const products = reactive([
  {productName: '티셔츠', price: 5000, productContent: '매우 아름다운 티셔츠입니다.', img: require('@/assets/img/2.jpg')},
  {productName: '바지', price: 10000, productContent: '매우 아름다운 바지입니다.', img: require('@/assets/img/1.jpg')},
  {productName: '양말', price: 1000, productContent: '매우 아름다운 양말입니다.', img: require('@/assets/img/3.jpg')},
]);

// 헤더
const navList = reactive([
  {navName: 'Home'},
  {navName: '상품'},
  {navName: '기타'},
]);

// console.log(products[0].price);

// ----------------
// 모달용
// ----------------

const flgModal = ref(false);
let product = reactive({});
function myOpenModal(item) {
  flgModal.value = true;
  product = item;
}

function myCloseModal(str) {
  flgModal.value = false;
  console.log(str); // 파라미터 연습용
}

// ----------------
// Provide / Inject 연습
// ----------------
const count = ref(0);

function addCount() {
  count.value++;
}

provide('test', {
  count
  ,addCount
}); // 구분 없이 전달할 객체 작성

</script>

<!-- -------------------------------------------------------------------------- -->

<style>
@import url(./assets/css/common.css);
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

/* CSS 파일 따로 분리 */
/* .nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}
.nav a {
  color: white;
  padding: 10px;
  text-decoration: none;
} */


</style>