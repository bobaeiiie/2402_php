<template>
   <!-- 메인 -->
    <main>
      <div class="main-container">
        <div class="side-container">
          <div class="user-container">
            <div class="user-profile">
              <img src="">
            </div>
            <div class="user-etc">
              <hr>
              <div class="user-name">회원 이름</div> <hr>
              <div class="user-rate">회원 등급</div> <hr>
              <div class="user-write">작성한 게시글 수</div>
            </div>
          </div>
          <div class="board-list-container">
            <p>무슨 게시판</p> <hr>
            <p>무슨 게시판</p> <hr>
            <p>무슨 게시판</p> <hr>
            <p>무슨 게시판</p> <hr>
          </div>
        </div>
        <div class="board-container">
          <div class="board-name"><h2>무슨 게시판</h2></div>
          <hr>
          <div class="board-info">
            <p>글 번호</p>
            <p>제목</p>
            <p>작성자</p>
            <p>작성일</p>
            <p>조회수</p>
          </div>
          <hr>
            <div class="boards">
              <div class="boards-top"></div>
              <div class="board-item">
                <p>글 번호</p>
                <p>제목</p>
                <p>작성자</p>
                <p>작성일</p>
                <p>조회수</p>
              </div>
            </div>
        </div>
      </div>
    </main>


  
  </template>
<script setup>
// import { onBeforeMount, reactive, ref } from 'vue';
// import { useStore } from 'vuex';

// const store = useStore();

// let detailItem = reactive({});
// let detailFlg = ref(false); 

// function openDetail(data) {
//   detailItem = data;
//   detailFlg.value = true;
// }

// function closeDetail() {
//   detailItem = {};
//   detailFlg.value = false;
// }

onBeforeMount(() => {
  if(store.state.boardData.length < 1 ) {
    store.dispatch('getBoardData');
  }
})



</script>
<style>
@import url('../css/boardList.css');
</style>
