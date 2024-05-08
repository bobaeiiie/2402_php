<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/myCommon.css">
    <link rel="stylesheet" href="/view/css/bootstrap/bootstrap.css">
    <script src="/view/js/bootstrap/bootstrap.js" defer></script>
    <script src="/view/js/regist.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>
    <title>내 정보 수정</title>
</head>
<body class="vh-100">
    <!-- 헤더 -->
    <?php require_once("view/inc/header.php"); ?>

    <main class="vh-100 d-flex justify-content-center place-items-center">
        <form style="width: 300px" action="/user/edit" method="post" class="login-form m-auto justify-content-center">
        <h3>회원 정보 수정</h3>
            <!-- <input type="hidden" value="u_id"> -->
            <div class="mb-3">
            <?php require_once("view/inc/errorMsg.php"); ?>
            </div>
            <div class="mb-3">
                <label for="u_name" class="form-label">이름</label>
                <input type="text" class="form-control" id="u_name" name="u_name" required value="<?php echo $this->getUserInfo('u_name'); ?>">
            </div>
            <div class="mb-3">
                <label for="u_pw" class="form-label">비밀번호</label>
                <input type="password" class="form-control" id="u_pw" name="u_pw" required>
            </div>
            <div class="mb-3">
                <label for="u_pw_chk" class="form-label">비밀번호 확인</label>
                <input type="password" class="form-control" id="u_pw_chk" name="u_pw_chk" required>
            </div>
            <button id="my-btn-complete" type="submit" class="btn btn-primary">완료</button>
            <a href="/board/list" class="btn btn-secondary float-end">취소</a>
        </form>
    </main>
    <footer class="fixed-bottom bg-primary text-center text-light p-3">저작권</footer>
</body>
</html>