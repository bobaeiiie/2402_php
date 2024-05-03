<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/view/css/myCommon.css">
    <link rel="stylesheet" href="/view/css/bootstrap/bootstrap.css">
    <script src="/view/js/bootstrap/bootstrap.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>로그인</title>
</head>
<body class="vh-100">
    <!-- 헤더 -->
    <?php require_once("view/inc/header.php"); ?>

    <main class="vh-100 d-flex justify-content-center place-items-center">
        <form style="width: 300px" action="/user/login" method="post" class="login-form m-auto justify-content-center">
            <div class="mb-3">
                <?php require_once("view/inc/errorMsg.php"); ?>
                <label for="u_email" class="form-label">이메일</label>
                <input type="text" class="form-control" id="u_emial" name="u_email">
            </div>
            <div class="mb-3">
                <label for="u_pw" class="form-label">비밀번호</label>
                <input type="password" class="form-control" id="u_pw" name="u_pw">
            </div>
            <button type="submit" class="btn btn-primary">로그인</button>
            <a href="/user/regist" class="btn btn-secondary float-end">회원가입</a>
        </form>
    </main>
    <footer class="fixed-bottom bg-primary text-center text-light p-3">저작권</footer>
</body>
</html>