<template>
  <!-- 상세 -->
  <div v-if="detailFlg" class="board-detail-box">
    <div class="item">
      <img :src="detailItem.img">
      <hr>
      <p>{{ detailItem.content }}</p>
      <hr>
      <div class="etc-box">
        <span>작성자 : {{ detailItem.name }}</span>
        <!-- <button @click="detailFlg = false" class="btn btn-bg-black btn-close">닫기</button> -->
        <!-- 리소스 관리를 위해 빈객체로 바꿔주기 위해 새 함수 생성 -->
        <div>
          <button @click="deleteDetail()" class="btn btn-close">삭제</button>
          <button @click="closeDetail()" class="btn btn-close">닫기</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 리스트 -->
  <div class="board-list-box">
    <div @click="openDetail(item)" v-for="(item, key) in $store.state.boardData" :key="key" class="item">
            <img :src="item.img">
    </div>
  </div>
  <button v-if="$store.state.moreBoardFlg" @click="$store.dispatch('getMoreBoardData')" type="button" class="btn btn-bg-black btn-more">+</button>

</template>
<script setup>
import { onBeforeMount, reactive, ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

let detailItem = reactive({});
let detailFlg = ref(false); 

function openDetail(data) {
  detailItem = data;
  detailFlg.value = true;
}

function closeDetail() {
  detailItem = {};
  detailFlg.value = false;
}

onBeforeMount(() => {
  if(store.state.boardData.length < 1 ) {
    store.dispatch('getBoardData');
  }
})

function deleteDetail() {
  
}



</script>
<style>
@import url('../css/boardList.css');
</style>
