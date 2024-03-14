<?php

// IF로 만들어주세요.
// 성적 
// 범위 : 
//		100   : A+
//		90이상 100미만 : A
//		80이상 90미만 : B
//		70이상 80미만 : C
//		60이상 70미만 : D
//		60미만: F

//출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"
// 0 ~ 100 입력 받았을 때, "당신의 점수는 "

// $num = 120; // 점수 저장용
// $text1 = "당신의 점수는 ";
// $text2 = " 점 입니다.";

// if($num === 100) {
//     echo $text1.$num.$text2."<A+>";
// }
// else if($num >= 90 && $num < 100) {
//     echo $text1.$num.$text2."<A>";
// }
// else if($num >= 80 && $num < 90) {
//     echo $text1.$num.$text2."<B>";
// }
// else if($num >= 70 && $num < 80) {
//     echo $text1.$num.$text2."<C>";
// }
// else if($num >= 60 && $num < 70) {
//     echo $text1.$num.$text2."<D>";
// }
// else {
//     if($num > 100 || $num < 1) {
//         echo "잘못된 값을 입력했습니다.";
//     }
//     else {
//         echo $text1.$num.$text2."<F>";
//     }
// }

// 함정이 있었다. &&연산자보다 아무것도 안쓴게 더 효율이 좋다

// 강사님 풀이
$num = 89;
$grade = ""; // 등급 저장용
$str_print = "당신의 점수는 %u점 입니다. <%s>"; // 출력 포맷. %u 숫자, %s 문자 대입됨
$msg = "잘못된 값을 입력했습니다.";
if(!($num >= 0 && $num <= 100)) {
    if($num === 100) {
        $grade = "A+";
    }
    else if($num >= 90) { // 100점은 위에서 체크했기 때문에 100보다 작다는 조건 걸지 않아도 됨
        $grade = "A";
    }
    else if($num >= 80) { 
        $grade = "B";
    }
    else if($num >= 70) { 
        $grade = "C";
    }
    else if($num >= 60) { 
        $grade = "D";
    }
    else {
        $grade = "F";
    }
    $msg = sprintf($str_print, $num, $grade);
}
echo $msg;

