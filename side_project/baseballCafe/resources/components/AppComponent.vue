<template>
<!-- 헤더 -->
<div class="container">
  <header>
    <div class="header-container">
      <div class="header-content">
        <div class="title-container">
          <div class="title">
            <router-link to="/"><h1>baseballllllllllll</h1></router-link>
          </div>
        </div>
        <div class="btn-container">
          <div class="btn-content">
            <button>Log in</button>
            <button>Sign up</button>
          </div>
          <div class="btn-content">
            <button>Log out</button>
          </div>
        </div>
      </div>
    </div>
  </header>
  
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
        <div></div>
      </div>
    </div>
  </main>
  
  <!-- 푸터 -->
  <footer class="footer-container">
    <h5>ⓒ 2024. baseball cafe All rights reserved.</h5>
  </footer>
</div>

</template>

<script setup>
import UserInfoComponent from './UserInfoComponent.vue';
</script>

<style>
@import url('../css/common.css');
</style>
