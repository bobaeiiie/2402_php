<?php
// 산술 연산자 : 사칙연산, 나머지 구하는 연산자
$num1 = 10;
$num2 = 8;
echo "\n";

// 더하기
$sum = $num1 + $num2;
// 연산 결과 저장도 가능
echo $num1 + $num2;
echo $sum, "\n";

// 빼기
$minus = $num1 - $num2;
echo $minus, "\n"; 

// 곱하기
$multi = $num1 * $num2;
echo $multi, "\n";

// 나누기
$division = $num1 / $num2;
echo $division, "\n";

// 나머지
$reminder = $num1 % $num2;
echo $reminder, "\n";

// 산술 대입 연산자
$num = 10;
// 기존값에 산술해서 다시 넣고싶어
// 더하기
$num = $num + 10;
$num += 10;
echo $num, "\n";

// 빼기
$num = $num - 5;
$num -= 5;
echo $num, "\n";

// 곱하기
$num = $num * 2;
$num *= 2;
echo $num, "\n";

// 나누기
$num = $num / 2;
$num /= 2;
echo $num, "\n";

// 나머지
$num = $num % 3;
$num %= 3;
echo $num, "\n";

// 문자열에서 ~ 
$str1 = "안녕";
$str1 = $str1."하세요";
$str1 .= "하세요";
echo $str1, "\n";


// 산술대입연산자로 프로그램 만들어주세요.
// 아래 과정을 실행해주세요.
// 출력 포맷은 "현재 tng_num의 값 : 계산한 값"으로 출력"
// 각 과정마다 출력

$tng_num = 100;
// echo $tng_num, "\n";
// // tng_num에 10을 더해주세요.
// echo $tng_num,':', $tng_num +=10,"\n";
// // tng_num에 5로 나누어주세요.
// echo $tng_num,':', $tng_num /=5,"\n";
// // tng_num에 4를 빼주세요.
// echo $tng_num,':', $tng_num -=4,"\n";
// // tng_num에 7로 나눈 나머지를 구해주세요.
// echo $tng_num,':', $tng_num %=7,"\n";
// // tng_num에 3을 곱해주세요.
// echo $tng_num,':', $tng_num *=3,"\n";

// 강사님 풀이
$base_str = "현재 tng_num의 값 : ";
// tng_num에 10을 더해주세요.
$tng_num += 10;
echo $base_str.(string)$tng_num,"\n";
// tng_num에 5로 나누어주세요.
$tng_num /= 5;
echo $base_str.(string)$tng_num,"\n";
// tng_num에 4를 빼주세요.
$tng_num -= 4;
echo $base_str.(string)$tng_num,"\n";
// tng_num에 7로 나눈 나머지를 구해주세요.
$tng_num %= 7;
echo $base_str.(string)$tng_num,"\n";
// tng_num에 3을 곱해주세요.
$tng_num *= 3;
echo $base_str.(string)$tng_num,"\n";

// 개행 "\n"도 변수에 넣어서 쓸 수 있다 
// $line = "\n"
// echo $base_str.(string)$tng_num,$line";


// 비교 연산자
// 두 수를 비교해서 true OR false로 반환

// 변수 1 > 변수 2 : 변수1이 변수2보다 크다.
var_dump( 3 > 2 );
var_dump( 1 > 2 );

// 변수 1 < 변수 2 : 변수1이 변수2보다 작다.
var_dump( 3 < 2 );
var_dump( 1 < 2 );

// 변수1 >= 변수2 : 변수 1이 변수 2보다 크거나 같다
var_dump( 1 >= 1 );
var_dump( 1 >= 2 );
var_dump( 1 >= 0 );

// 변수 1  <= 변수2 : 변수 1이 변수 2보다 작거나 같다
var_dump( 1 <= 1 );
var_dump( 1 <= 2 );
var_dump( 1 <= 0 );

// 같다(=)는 주의
// 변수1 == 변수2 : 변수1과 변수2가 같다. 불완전 비교 (데이터타입 체크 안함)
var_dump( 1 == 1 );
var_dump( 1 == "1" ); // 데이터 타입 다른데 true로 나와버림. 버그남
// 변수1 === 변수2 : 변수1과 변수2가 같다. 완전 비교. 표준. (데이터타입 체크함)
var_dump( 1 === 1 );
var_dump( 1 === "1" );// 데이터 타입 달라서 false로 나옴.
var_dump( 1 === (int)"1" ); // true로 나옴. 형변환 중요

// 같지 않다 
// 느낌표(!)는 부정의 뜻을 가짐
// 변수1 != 변수2 : 변수1과 변수2가 같지 않다. 불완전 비교 (데이터 타입 체크 안함)
// 자바스크립트에서 많이 사용함. 자유도가 높은 언어라서.
var_dump( 1 != 1 );
var_dump( 1 != "1" );
// 변수1 !== 변수2 : 변수1과 변수2가 같지 않다. 완전 비교 (데이터타입 체크함)
var_dump( 1 !== 1 );
var_dump( 1 !== "1" );

// 논리 연산자
// and 연산자(&&) : 조건이 모두 만족하면 true, 하나라도 틀리면 false
var_dump( 1 === 1 && 2 === 2); // 모두 만족해야 true
var_dump( 1 === 1 && 1 === 2); // 둘 중 하나 틀렸기 때문에 false

// or 연산자(||) : 하나라도 만족하면 true, 모두 틀리면 false
var_dump( 1 === 1 || 2 === 2); // 
var_dump( 1 === 1 || 1 === 2);
var_dump( 1 === 3 || 1 === 2); // 

// not 연산자(!) : 연산의 결과를 반전
var_dump( !( 1 === 1 ) ); // 먼저 계산하라는 뜻의 괄호


