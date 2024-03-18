<?php
// 함수 
// 자주할법한 처리들을 무듈로 만들어둠. 필요에 따라서 호출해서 사용함. 
// 함수만 저장해둔 파일 따로 두고 개발 진행

function my_sum($num1, $num2){ // 파라미터, 인자, 매개변수
    return $num1 + $num2;
}
echo my_sum(32, 54); // 아규먼트, 인수
echo "\n";

function print_hello() {
    echo "안녕 PHP";
}
print_hello();
echo "\n";

// 파라미터 default 설정
/**
 * 두 자리를 더하는 함수
 * 
 * @param int $num1 더할 첫번째 숫자
 * @param int $num2  더할 두번째 숫자, default 10
 * @return int 합계
 */
// 함수 만들면 코멘트 남겨둠

function my_sum2(int $num1, int $num2 =10) { // 디폴트 설정은 후순위로 밀림
    // 타입 int까지 쓰는게 표준이다
    return $num1 + $num2;
}
echo my_sum2(5);
echo "\n";

// 강의 영상 다시 보기 **************************************
echo "\n";

// -, *, /, % 를 해주는 각각의 함수를 만들어주세요.

// 빼기
function my_minus(int $num1, int $num2) {
    return $num1 - $num2;
}
echo my_minus(10,1);
echo "\n";

// 곱하기
function my_multi(int $num1, int $num2) {
    return $num1 * $num2;
}
echo my_multi(10,2);
echo "\n";

// 나누기
function my_div(int $num1, int $num2) {
    return $num1 / $num2;
}
echo my_div(10,5); // 나누기 0 으로 하려고 하면 에러남
echo "\n"; 

// 나머지
function my_remind(int $num1, int $num2) {
    return $num1 % $num2;
}
echo my_remind(10,3);
echo "\n";

$str = "처음 정의";

function test(string $str) {
    $str = "test()에서 변경";
} //  일반적 처리 흐름에서 동떨어짐 호출되면 불러와짐, 서로 다른 메모리에 저장된 str임
// 하나의 함수 내에서만 저장되기 때문에 다른 함수에 같은 이름이 있다해도 같은 변수가 아님

function test2(string $str) {
    $str = "test()에서 변경";
    return $str;
}

$str = test2($str);
echo $str; // 함수의 영역 밖에서 에코하므로 "처음 정의"가 출력
           // test2의 $str이 $str이다 정의했으므로 "test~"가 출력 
echo "\n";

// 가변 파라미터 Variable_length argument
// 파라미터 수 몇 개일지 모를 때 곤란. 가변 파라미터로 테스트해 볼 수 있다
function my_sum_all (...$numbers) { // 여러개 받을 수 있는 배열 타입으로서 받음 (쩜쩜쩜+변수명)
    // $numbers = func_get_args(); // PHP 5.5 이하
    print_r($numbers);
}
my_sum_all(3,5,2,5,5);
echo "\n";

// function sum_all (...$sum_numbers) {
    //     print_r($sum_numbers);
    // }
    // echo sum_all(2,3,4);
    
// 파라미터로 받은 모든 수를 더하는 함수를 만들어주세요.
// function sum_all(...$sum_numbers) { // 함수 이름 중복 금지
//     $sum = 0; // 초기화 하는 이유는 더하기이기 때문에 초기값 0
//     foreach ($sum_numbers as $val) {
//         $sum += $val; // 이부분을 연습해야함
//     }
//     return $sum; // 반복문 밖에 
// }
// echo sum_all(5,7,2);

function sum_all(...$sum_numbers) {
    $sum = 0;
    foreach ($sum_numbers as $val) {
        $sum += $val;
    }
    return $sum;
}
echo sum_all(2,4,6,8);
echo "\n";

// 참조 전달
function test_v($num) {
    $num = 3;
}
function test_r(&$num) { // &=참조전달로서 파라미터를 사용하겠다.
    $num = 5;
}
$num = 0;
test_r($num); // 값 복사x 원본 주소 가져옴
echo $num;
echo "\n";

// 참조 변수
$a = 1;
$b = $a;
$a = 3;

echo $b;

// 강의 영상 복습 **************************************
// 공간 복잡도, 시간 복잡도 라는 개념이 있음...
// 함수 정의, 함수 호출 보는 것이 중요하다. 