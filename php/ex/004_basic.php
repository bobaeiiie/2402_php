<?php
// 변수(Variable)
$str = "안녕 php";
// 출력하고자 하는 값 일일히 적지 않고 변수에 저장하고 씀
// 뭔가 담을 수 있는 그릇. 
echo $str;
// 변수는 $달러 붙이고 = 오른쪽의 것을 = 왼쪽에 담는다
// 오타 없는지 잘 보기. 변수를 찾을 수 없음
// 메모리 RAM에 올리는 작업이 변수. 값이 저장될 방을 만듦 
// PHP 처리 종료됐을 때 사라지거나 GC(가비지컬렉션)가 알아서 스캔 후 필요없다고 판단될 시 지움
// C, C++은 GC 없어서 알아서 지워줘야함 메모리 관리에 고생

// 변수 명명 규칙
// 변수명은 영문 대소문자,숫자,언더바만!! 사용 가능, 버티컬 바 등은 특수 기능 있음
// 숫자 시작X, 공백X 얘도 특수 기호
// 한글 등 멀티바이트 언어(3~4byte)로도 설정 가능하나, 사용하지 말자
$num1 = 1;
echo $num1;

$Num = 1;
$num = 2;
echo $Num, $num;

// 값 바꾸기 가능
$num = 1;
$num = 2;

// 네이밍 기법
// 어떤 개발을 하냐에 따라 유동적으로 사용

// 1. 스네이크 기법
$user_name;

// 2. 카멜 기법
// 객체지향 개발 시에 많이 사용
$userName;

echo "\n"; // 개행 문자

// 상수(Constants) : 절대 변하지 않는 값
// 데이터 타입 문자열도 가능
$num = 1;
$num = 2;

// 전부 대문자, 언더바로 연결
// 상수명,값으로 선언하고 상수명으로 호출
define("USER_AGE", "가나다라");
// define("USER_AGE", 30); -> 이미 선언된 상수이므로 워닝 일어나고 값이 바뀌지 않음
// 워닝은 에러가 아님. 경고만 나타내고 처리는 이어감 주의@@@
echo USER_AGE;

// 점심메뉴
// 탕수육 9000원
// 햄버거 10000원
// 빵 2000원
echo "\n"; echo "\n";
$menu = "점심메뉴\n";
$tang = "탕수육 9000원\n";
$hambg = "햄버거 10000원\n";
$bread = "빵 2000원\n";
echo $menu, $tang, $hambg, $bread;
// 프로그램은 항상 위에서 아래로, 오른쪽에서 왼쪽으로 처리
define("MENU","점심메뉴\n");
echo MENU;
// 상수는 상수명만 호출해야 함 달러 붙이면 변수임

// 스왑
// '오른쪽을 왼쪽의 값으로 넣는다'를 이해하고 응용
echo "\n";
$swap1 = "곤드레밥";
$swap2 = "짜장면";
$tmp = "";
// 한번에 바꾸는 함수 없어서 임시변수 만들어서 실행
$tmp = $swap1;
$swap1 = $swap2;
$swap2 = $tmp;
echo $swap1,",",$swap2;
