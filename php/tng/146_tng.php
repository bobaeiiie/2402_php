<?php
$id = "";
$pw = "";
$email = "";
// if(isset($_GET["id"])) {
//     $id = $_GET["id"];
// }
// if(isset($_GET["pw"])) {
//     $pw = $_GET["pw"];
// }

// method="get", $_POST 밖에 차이 없음

$id = isset($_GET["id"]) ? $_GET["id"] : "";
$pw = isset($_GET["pw"]) ? $_GET["pw"] : "";
$email = isset($_GET["email"]) ? $_GET["email"] : "";
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
            <form action="/146_tng.php" method="get"> 
                <label for="id">ID</label>
                <input type="text" name ="id" id="id" required placeholder="ID 입력">
                <br>
                <label for="pw">PW</label>
                <input type="password" name="pw" id="pw" required placeholder="PW 입력">
                <br>
                <label for="email">이메일</label>
                <input type="email" name="email" id="email" required placeholder="이메일 입력">
                <br>
                <button type="submit">로그인</button>
            </form>
    </fieldset> 
    <?php
        if($id !== "") {
            echo "<h2>당신의 ID는 <em> $id </em> 입니다.</h2>";
        }
        if($pw !== "") {
            echo "<h2>당신의 PW는 <em> $pw </em> 입니다.</h2>";
        }
        if($email !== "") {
            echo "<h2>당신의 이메일은 <em> $email </em> 입니다.</h2>";
        }
    ?>
</body>
</html>