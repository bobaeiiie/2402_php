<?php
// 주석 작성 방법
/**
 * 여러줄 주석 작성
 * 함수 이름
 * 파라미터1
 * 파라미터2
 * 리턴2
 */

// PHP 변수 중구난방 위치 중구난방 잘 지키면서 개발해야함
// 1차 전까지는 퓨어한 PHP 배움 파일 안나눔 나눠봐야 리스트 페이지 하나 메인페이지 하나 입력 페이지 하나 
// 2차까지 이론 배우는 사이 파일 쪼갬
// 커맨드로 설치 확인하는것 익히고 신입 첫 업무가 인스톨이기 때문에 꼭 연습해야함





// 03.13 수업

// TODO 코멘트 : 개발자의 실수를 방지하기 위해 나중에 해야할 일을 작성하는 코멘트
// TODO : 나중에 삭제할 것
// f5번 - 디버그 콘솔에 출력, 가장 속도 빠름, 설정값만 보여줌

// echo : 구문, 단순 출력 현업에서 가장 많이 사용
echo "안녕, php";

// print : 함수, 단순 출력, 현업에서는 잘 사용안함
// 리턴 값이 있음 연산이 하나 더 들어감 echo에 비해 속도 조금 느림
print("프린트로 안녕");

// var_dump() : 함수, 출력하고자 하는 값의 상세정보까지 출력
// 함수, 변수 어떤값 자세하게, 경로, 타입, 구조가 다 나옴
// 보안상 문제 있음 일반적 사용x 개발 도중 값 확인 필요할 때 사용, 실제 서비스 사용 금지
var_dump("바덤프 안녕"); //TODO : 나중에 삭제할 것

// Xdebug 사용하면 브레이크포인트에서 실행하다가 멈춤 한줄한줄 멈추면서 실행확인하는것을 디버깅이라고 함 

echo 1;