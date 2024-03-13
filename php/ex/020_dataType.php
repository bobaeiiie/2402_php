<?php
// 기본적으로 테이터타입 같은데 객체마다 다를수잇으니 가장 먼저 확인

// int : 숫자, 정수
var_dump(123);

// double : 실수, float 말고 기본이 double
var_dump(3.141592);

// string : 쌍따옴표 혹은 홑따옴표
// 퓨어 개발은 쌍 라라벨은 홑,  구분 잘해야함
// 출력할 때는 기본인 쌍따옴표로, 컴이 자기가 읽을 수 있게 정해진 기호로 변환
// "나의 이름은 '정보배'입니다.";
// 쌍,홑따옴표 유동적으로 사용
var_dump("abcd");
var_dump('abcd');

// boolean : 논리
// true, false만 가지고 있는 데이터 타입
// 약어로 bool로 출력
var_dump(true, false);

//NULL 
// 값 자체가 없음
var_dump(NULL);

// array : 배열
var_dump([1,2,3]);

// object : 객체
// 입문 어려운 영역
$obj = new DateTime();
var_dump($obj);

// 형변환 : 변수 앞에 데이터 타입 명칭 써주면 변환됨
var_dump((int)'123');
var_dump((string)456);
var_dump((int)'abc'); // 주의: 이렇게는 하면 안된다. 