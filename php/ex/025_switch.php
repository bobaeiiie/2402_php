<?php

// switch문
// if는 범위 swaitch는 특정 값에 더 적합
// $food = "피자";
// switch($food) {
//     case "김밥":
//         echo "한식"; // 처리
//         break;
//     case "피자": // 처리 없어서 쭉 내려감. 피자 -> 양식 출력
//     case "햄버거": 
//         echo "양식";
//         break;
//     default:
//         echo "기타";
//         break; // 없어도 되는데 관습적으로 적음
// }

$place = "1"; 
switch($place) {
    case "1":
        echo "금상";
        break;
    case "2": 
        echo "은상";
        break;
    case "3": 
        echo "동상";
        break;
    case "4": 
        echo "장려상";
        break;   
    default:
        echo "노력상";
        break;
} 
// 변수명은 직관적으로 빨리 파악할 수 있게 짓기 ex) $rank
// 변수명이나 키는 한글 잘 안씀 영어나 숫자. 값은 상관없음
// 하나의 변수에는 하나의 데이터만. 값 많으면 어레이로

// if문, switch문 -> 분기문
// switch는 잘 안씀 if문으로 대체 가능

// 위의 switch문을 if문으로 바꾸면
$rank = "3등"; 
if($rank === "1등") {
    echo "금상";
}
else if($rank === "2등") {
    echo "은상";
    }
else if($rank === "3등") {
    echo "동상";
}
else if($rank === "4등") {
    echo "장려상";
}
else {
    echo "노력상";
} 