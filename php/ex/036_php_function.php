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
echo "\n";
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