<?php 

// 240318
// function sum_all(...$sum_numbers) { // 몇 개의 값이 올 지 모름
//     $sum = 0; // 값을 담을 공간 지정
//     foreach ($sum_numbers as $val) { 
//         $sum += $val; // $sum_numbers의 값은 서로 더해 $sum에 담는다
//     }
//     return $sum; // $sum을 출력한다
// }
// echo sum_all(1,2,3,4,5); // sum_all할 값들
// echo "\n";

// $lotto = []; // 값을 담을 공간 지정
// while(count($lotto) < 6) { // $lotto의 사이즈가 6개다
//     $number = random_int(1, 45); // 1~45 사이의 랜덤한 숫자를 $number에 넣겠다
//     if (!in_array($number, $lotto)) { // $number에 $lotto가 없다면 (중복 제거)
//         $lotto[] = $number; // $number는 $lotto의 값이 된다
//     }
// }
// foreach ($lotto as $val) { 
//     echo $val." "; // 배열 $lotto의 값과 공백 출력
// }

// for($i = 0; $i <= 100; $i++) {
//     if($i % 3 != 0) {
//         echo $i." 입니다.\n"; 
//     }
// }

// echo "--------------------------------------------------\n";

// 240320
for($i = 1; $i <= 10; $i++) {
    if($i % 3 !== 0) {
        echo $i."입니다.\n"; 
    }
    else {
        echo "짝!\n"; 
    }
}

// 강사님 풀이
$arr = range(1,10);

foreach($arr as $key => $val) {
    if(($val % 3) === 0) {
        continue;
    }
    echo $val."입니다.\n";
}


//240321

// $dbHost = "localhost";
// $dbUser = "root";
// $dbPw = "php505";
// $dbName = "employees";
// $dbCharset = "utf8mb4";
// $dbDsn = "mysql:host=".$dbHost."dbName=".$dbName."charset=".$dbCharse;

// $opt = [
//     PDO::ATTR_EMULATE_PREPARES => false
//     ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//     ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
// ]

// $conn = new PDO($dbDsn, $dbUser, $dbPw, $opt);

// $sql = "SELECT * FROM employees LIMIT 5 ";

// $smtm = $conn->query($sql);
// $rresult = $stmt->fetchAll();
// print_r($result);

// $conn = NULL;