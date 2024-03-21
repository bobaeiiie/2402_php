<?php


// 파라미터 부분에 들어감
// localhost(도메인) /파일명(패스) ?name{키}=hong{값}(파라미터) &(파라미터 연결)gender=M
// 민감한 정보들 겟 메소드로 보낼 수 없음

// $question = $_GET["q"];
// php의 장점: 변수 안에 연상배열로 다 들어감. 하나씩 가져오지 않아도 됨
// 정보 오고감에 배열을 많이 사용한다. 그래서 중요
// localhost/146_http_method_get.php?name=홍길동&gender=M
// print_r($_GET["name"]); 이름을 가져오고 싶을 때

$question = "";
if(isset($_GET["q"])) {
    $question = $_GET["q"];
}
// q가 있으면 셋팅, 없으면 셋팅x

// 삼항연산자 **********************************************************************************
// 변수 = 조건식 ? true일 경우 : false일 경우
$question = isset($_GET["q"]) ? $_GET["q"] : "";

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>검색어를 입력하세요</h1>

    <form action="/146_http_method_get.php" method="get"> 
        <input type="text" name="q">
        <button type="submit">검색</button>
    </form>
    <br>
    <br>
    <?php
        if($question !== "") {
            echo "<h2>당신의 검색어는 <span style=\"color:red;\">$question</span> 입니다.</h2>";
        }
    ?>
       <?php
        if($question !== "") {
   ?>
   <h2>당신의 검색어는 <span style="color:blue"><?php echo $question ?></span> 입니다.</h2>
	 <?php
        }
   ?>
</body>
</html>