<?php

// method post
// head부분에 정보가 담김. 외부로 노출되면 안되는 민감 정보들을 담음
print_r($_POST);
// print_r($_POST["chk[]"]); 
// warning은 떠도 처리 계속됨. fatal error는 처리 종료 실행 안함.
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>로그인 창</legend>
            <form action="/146_http_method_post.php" method="post"> 
                <input type="hidden" name="method" value="DELETE">
                <label for="id">ID</label>
                <input type="text" name ="id" id="id" required placeholder="ID 입력">
                <br>
                <label for="pw">PW</label>
                <input type="password" name="pw" id="pw" required placeholder="PW 입력">
                <br>
                <label for="subway">서브웨이</label>
                <input type="checkbox" name="chk[]" id="subway" value="subway">
                <label for="pan">빵</label>
                <input type="checkbox" name="chk[]" id="pan" value="빵">
                <label for="do">도삭면</label>
                <input type="checkbox" name="chk[]" id="do" value="도삭면">
                <br>
                <label for="m">남자</label>
                <input type="radio" name="radio" id="m" value="남자">
                <label for="f">여자</label>
                <input type="radio" name="radio" id="f" value="여자">
                <br>
                <button type="submit">로그인</button>
            </form>
    </fieldset> 
    <?php
    ?>
</body>
</html>