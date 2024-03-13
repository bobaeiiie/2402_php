<?php
// 연결 연산자 (Concatenation Operator)
// 닷.으로 연결
$str1 = "안녕,";
$str2 = "PHP!!";
$num = 1111;
echo $str1.$str2.(string)$num;
// 숫자가 문자열로 형변환 현상 일어남, 의도라면 생략 가능하지만 확실히 문자열로 바꿔줘야 함
// 특히 객체지향으로 개발할 시 버그 많이 남, php에선 데이터타입 둔감해질 수 있음 조심

// 출력: "안녕, 하세요!~"
echo "\n";
$str1 = "안녕";
$str2 = "하세요!";
echo $str1.', '.$str2.'~';

