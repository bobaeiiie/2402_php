<?php
// PHP 내장함수

// trim(문자열) : 공백 제거 함수
$str = "  홍길동 "; // 문자열 안에 있는 공백은 따로 다른 방법으로 없앰
echo trim($str);
echo "\n";

// strtoupper(문자열) : 영어 대문자로 변환 후 출력
echo strtoupper("sgdghdgjn");
echo "\n";
// strtolower(문자열) : 영어 소문자로 변환 후 출력
echo strtolower("EHTJDAZTJD");
// 두서 없는 명명 규칙들 중 하나
echo "\n";

//str_replace(대상 문자열, 변경 문자열, 대상 문자열) : 특정 문자를 치환
echo str_replace("c","Z","abcdefg"); // 출력 : abZdefg
echo "\n";
echo str_replace("cd","","abcdefg"); // 출력 : abefg 
echo "\n";
echo str_replace("a","", str_replace("f","","abcdefg")); // 출력 : bcdeg
echo "\n";

//mb_substr(문자열, 시작 위치, 출력할 개수) : 문자열을 시작 위치에서 종료위치까지 잘라서 반환
// 한글은 멀티바이트 문자이기 때문에 앞에 mb_붙여라
$str = "홍길동갑순이";
echo mb_substr($str, 1, 4);
echo "\n";
echo mb_substr($str, 2); // 출력할 개수는 생략이 가능하고 시작 위치에서부터 다 가져오게 됨
echo "\n";

// mb_strpos(대상문자열, 검색할 문자열) : 검색할 문자열이 있는 위치(int)가 반환
$str = "나는 홍길동 입니다."; // 공백도 센다. 같은 글자가 있다면 가장 첫 글자의 위치 반환
echo mb_strpos($str, "홍");
echo "\n";

if(mb_strpos($str,"ㅁ")) { // "홍"이라면 포함됨이 출력됨
    echo "포함됨";
}
else {
    echo "없어";
}
echo "\n";

if(mb_strpos($str,"나") !== false) { // 컴터는 0을 false로 인식한ㅁ 그래서 0자리라서
    echo "포함됨";
}
else {
    echo "없어";
}
echo "\n";
echo "\n";
// sprintf(포맷문자열, 대입 문자열1, 대입 문자열2...)

$base_msg = "%s이/가 틀렸습니다.(%s)"; // %s는 문자열을 의미
$print_msg = sprintf($base_msg, "비밀번호 ", "에러코드00"); // 문자열 완성 되돌려주는 함수
echo $print_msg."\n";
// printf($print_msg); 완성된 문자열을 출력. 잊어도됨 
// 차이점 다시 보기 *********************

// isset(변수) : 변수의 설정 여부 확인 true/false 리턴. 값이 세팅됐는지 체크할 때 많이 씀
$ans1 = ""; // 값이 있음. 빈 문자열이라는 값
$ans2 = NULL; // 아무런 값이 없음
$ans3 = 0;
$ans4 = [];
var_dump(isset($ans1),isset($ans2),isset($ans3),isset($ans4),isset($ans5));
echo "\n";
// 컴은 항상 메모리에 저장함. NULL은 공간을 가지지 않음. 주소값만 가진 상태.
// 출력된 내용
// bool(true)
// bool(false)
// bool(true)
// bool(true)
// bool(false)
// 값이 없다로 인식하는 것은 NULL과 값 지정해주지 않은 ans5 뿐
// NULL과 위의 ans5 차이: 주소값을 할당받은 것과 그렇지 않은 것

// empty(변수) : 변수의 값이 비어있는지 확인해서 true/false를 리턴
var_dump(empty($ans1),empty($ans2),empty($ans3),empty($ans4),empty($ans5));
echo "\n";
// 전부 다 비어있다고 인식함. 사람이 보기에 비어있는지를
// isset과 체크 다름. 서로 사용하는 상황 다름.

// gettype(변수) : 데이터 타입을 문자열로 반환
$str1 = "abc";
$int1 = 5;
$arr1 = [];
$double1 = 1.4;
$boo = true;
$null1 = NULL;
$obj = new DateTime();

var_dump(gettype($str1),gettype($int1)
    ,gettype($arr1),gettype($double1)
    ,gettype($boo),gettype($null1),gettype($obj),);
echo "\n";
// 출력된 내용
// string(6) "string"
// string(7) "integer"
// string(5) "array"
// string(6) "double"
// string(7) "boolean"
// string(4) "NULL"
// string(6) "object"

// 형변환
$i = 3;
$i2 = (string)$i; // 캐스팅 기법. 이 상황에만 형변환 시켜주는 
var_dump($i, $i2);
echo "\n";

// settype(변수) : 변수의 데이터 형을 변환, 원본 변수 자체가 변경되므로 주의 
$i = 3;
$i2 = settype($i, "string");
var_dump($i, $i2); // 원본데이터 함부로 수정 금지. 오염됐다.
echo "\n";
// time() : 유닉스 타임스탬프 1970/01/01 기준으로 시간 반환
echo time(); // 사람이 알아보기 어려움
echo "\n";
// date(포맷 형식, 타임스탬프 값) : 타임스탬프 값을 날짜 포맷 형식으로 변환해서 반환
echo date("Y-m-d H:i:s",time()); // 2000-01-01 13:50:06
// 윤달 계산 주의해야함
echo "\n";
// $date1 = new DteTime("2024-03-31");
// $date1 -> modify("-1 month");
// echo $date1 -> 
// 강의 영상 다시 보기

// ceil(숫자), round(숫자), floor(숫자)
var_dump(ceil(1.4), round(2.5), floor(1.9));

// random_int(시작값, 마지막값) : 시작값~ 마지막값 범위의 랜덤한 숫자를 반환
echo random_int(1, 10);

// 주의 : isset과 empty 차이점 알기, 윤달 날짜 계산할 때 오차 생길 수 있다는거 알기