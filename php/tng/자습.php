<?php 

function sum_all(...$sum_numbers) { // 몇 개의 값이 올 지 모름
    $sum = 0; // 값을 담을 공간 지정
    foreach ($sum_numbers as $val) { 
        $sum += $val; // $sum_numbers의 값은 서로 더해 $sum에 담는다
    }
    return $sum; // $sum을 출력한다
}
echo sum_all(1,2,3,4,5); // sum_all할 값들
echo "\n";

$lotto = []; // 값을 담을 공간 지정
while(count($lotto) < 6) { // $lotto의 사이즈가 6개다
    $number = random_int(1, 45); // 1~45 사이의 랜덤한 숫자를 $number에 넣겠다
    if (!in_array($number, $lotto)) { // $number에 $lotto가 없다면 (중복 제거)
        $lotto[] = $number; // $number는 $lotto의 값이 된다
    }
}
foreach ($lotto as $val) { 
    echo $val." "; // 배열 $lotto의 값과 공백 출력
}