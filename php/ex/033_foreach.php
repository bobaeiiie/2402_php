<?php

// foreach : 배열을 루프하는데 특화된 반복문, 배열의 길이만큼 루프
// php에서 가장 많이 사용되는 문법 중 하나 

$arr = [9,8,7,6,5];

// 배열의 값만 이용할 경우
// foreach($arr as $val) {
//     echo $val."\n";
// }

// 배열의 키와 값 모두 이용할 경우
// foreach($arr as $key => $val) { // 배열만들 때 처럼 응용 ("name" => "홍길동")
//     echo "key : $key, value: $val \n"; // 에코의 문법임 문자열 안에 변수 넣어도 연결로 인식
// }

$arr = [
    ["name" => "홍길동", "age" => "20", "gender" => "남자"]
    ,["name" => "갑순이", "age" => "20", "gender" => "여자"]
    ,["name" => "갑돌이", "age" => "30", "gender" => "남자"]
];

$msg_format = "<h3>%s</h3>의 나이는 %d이고, 성별은 %s입니다.<br>";

// 출력: name의 나이는 age이고, 성별은 gender입니다.

echo "\n";

// foreach($arr as $item) {
//     echo $item["name"]
//     ."의 나이는"
//     .$item["age"]
//     ."이고, 성별은"
//     .$item["gender"]
//     ."입니다\n"; // 보기 편하게 개행, 연결연산자 기준으로 개행함
// }

$arr2 = [
    "name" => "홍길동"
    ,"age" => "20"
    ,"gender" => "남자"
];


// 아래의 배열에서 foreach를 이용해 아래처럼 출력해 주세요.
// ID List
// meerkat1
// meerkat2
// meerkat3
$arr = [
	["id" => "meerkat1", "pw" => "php504"]
	,["id" => "meerkat2", "pw" => "php504"]
	,["id" => "meerkat3", "pw" => "php504"]
];

echo "ID List\n";
foreach($arr as $val) {
    echo $val["id"]."\n";
}

// 배열의 값중 가장 큰 수를 구해주세요.
// 예시)
// print_r($arr);
// 위의 배열 중 가장 큰 수인 9가 출력 되어야 합니다.

// arsort($arr);
// print_r($arr);

// $tmp = 0;
// foreach($arr1 as $val1) {
    //     if($tmp < $val1) {
        //         $tmp = $val1;
        //     }
        // }
        // echo $tmp;
        
        
        // if($arr[0] < )
        
        
// 강사님 풀이
$arr1 = [4,5,7,10,3,2,9];
$max_num = 0;
$min_num = $arr[0]; //혹은 999999999999999;
foreach($arr1 as $val) {
    // MAX 구하기
    if($max_num < $val) {
        $max_num = $val;
    }
    // MIN 구하기
    if($min_num > $val){
        $min_num = $val;
    }
}
echo $max_num."  ". $min_num;

// 이걸 내가 어떻게 하지
// 케이스 많이 보고 내가 상상할 수 있는 범위 넓히기
// 매일매일 꾸준히 반복하기















