<?php
// 배열 (array) : 하나의 변수에 여러개의 값을 담을 수 있는 데이터 타입
$arr1 = array(1, 2, 3); // 5.4버전 이전 배열 선언 방식
print_r($arr1); // print_r함수 데이터 확인용으로 쓰고 잘 안쓰는 편

$arr2 = [4, 5, 6]; // 5.4버전에 추가된 배열 선언 방식, 현업에서 많이 쓰고 속도 빠름
print_r($arr2);
// 각각 고유한 방번호 가짐 [0, 1, 2]

// echo $arr2; 에코는 문자열 출력 구문인데 어레이는 배열이어서 워닝뜸.
// 배열에서 특정 요소의 값 획득
echo $arr2[0]; // 배열의 인덱스 혹은 key 라고 부름

//배열에 요소(item) 추가
$arr2[] = 100;
print_r($arr2); //3번방에 알아서 들어감 인덱스 번호는 자동으로 늘어남

// 특정 요소의 값 변경(대입) 
$arr2[2] = 50;
print_r($arr2);

// 음식 종류 5개 이상을 인덱스 배열로 만들어주세요.
$arr_food = [ // 명명규칙에서 추측이 되면 좋다 ($배열_주제)
    '돈까스'
    ,'짬뽕'
    ,'햄버거'
    ,'초밥'
    ,'김치찌개'
];  // 구분을 쉽게 하기 위해 
print_r($arr_food);
//가장 좋아하는 음식 출력
echo $arr_food[3]; 

// 연관 배열 , 현업에서 많이 쓰고
$arr_asso = [
    "name" => "홍길동" // 키 명 => 담을 값
    ,"age" => 20
];
print_r($arr_asso);

echo $arr_asso["name"];

// $arr_asso 키(gender), 값(여자)인 아이템을 추가
$arr_asso["gender"] = "여자";
print_r($arr_asso);
$arr_asso["gender"] = "남자";
print_r($arr_asso);

// 다차원배열 다중배열 (Multidimensional Array): 값들이 얼마나 깊이 들어가있는지
$arr_multi = [
    [1,2,3]
    ,[
        4
        ,[10,11,12]
        ,6
        ]
    ,7
];
echo $arr_multi[1][2];
echo $arr_multi[2];
echo $arr_multi[1][1][1];
$arr_result = [
    ["name" => "홍길동", "age" => 20]
    ,["name" => "홍길동", "age" => 99]
    ,["name" => "홍길동", "age" => 15]
];
echo $arr_result[1]["name"]; 
echo $arr_result[2]["age"]; 
echo "\n";

// 배열의 길이, 사이즈를 반환하는 함수
$arr = [1,2,3,4,5];

// 
echo count($arr);
echo count($arr_result[0]);

// unset() : 배열의 특정 아이템을 삭제
unset($arr[2]);
print_r($arr); // 키 자체는 정렬되지 않음 2인덱스가 사라짐

// 배열의 정렬
// 보통은 쿼리에서 정렬해오지만 알아두기

// asort() : 배열의 값을 기준으로 오름차순 정렬
$arr = [5,4,3,8,1]; // $arr 기존 값에서 '재정의'한다고 표현
asort($arr);
print_r($arr); 

// arsort() : 배열의 값을 기준으로 내림차순 정렬
arsort($arr);
print_r($arr); // 키가 중구난방이기 때문에 키로 접근하면 안됨, *루프문으로 가져옴

// ksort() : 배열의 키를 기준으로 오름차순 정렬
ksort($arr);
print_r($arr);

// krsort() : 배열의 키를 기준으로 내림차순 정렬
krsort($arr);
print_r($arr);
// 정렬을 해 두고 가져오는 것이 좋음

// 키는 요리명, 값은 주재료 하나로 이루어진 배열을 만들어주세요. (배열 길이는 4)
$arr_food2 = [
    "김치찌개" => "김치"
    ,"순두부찌개" => "순두부"
    ,"된장찌개" => "된장"
    ,"동태찌개" => "동태"
];
print_r($arr_food2);
echo count($arr_food2);

// 김치찌개의 주재료를 더 쓰려면
$arr_food2["김치찌개"] = ["김치","물","돼지고기","등등"];
print_r($arr_food2);


