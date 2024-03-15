<?php
// while 문
// 조건만 맞으면 무조건 돎

$cnt = 0;
while($cnt < 3) {
    echo "count : $cnt \n";
    $cnt++;
}

$cnt = 0;
while(true) {
    echo "$cnt \n";
    if($cnt === 3) {
        break;
    }
    $cnt++; // 증감연산자 위치 이용 많이함 중요
}

echo "\n";

// while을 이용해서 2단을 출력해주세요
$num = 1;
$dan = 2;
// while($num < 10) {
//     echo "2 X ".$num." = ".(2 * $num)."\n";
//     $num++;
// }

// while($dan < 10) {
//     echo "** ".$dan."단 **\n";
//     while($num < 10 ) {
//         echo $dan." X ".$num." = ".($dan * $num)."\n";
//         $num++;
//     }
//     $dan++;
// }


// while ($dan < 10) {
//     $num = 1; // $num가 10보다 작을 때만 반복되게 재정의함
//     echo "** ".$dan."단 **\n";
//     while($num < 10) {
//         echo $dan." X ".$num." = ".($dan * $num)."\n";
//         $num++;
//     }
//     $dan++;
// }


// 강사님 풀이
// $num = 1;
// while($num < 10) {
//     echo "2 X ".$num." = ".(2 * $num)."\n";
//     $num++;
// }

$dan = 2;
$multi_num = 1;
while($dan < 10) {
    $multi_num = 1;
    echo $dan."단\n"; 
    while($multi_num < 10) {     // for foreach 다 들어갈 수 있음 제약은 없다
        echo $dan." X ".$multi_num." = ".($dan * $multi_num)."\n";
        $multi_num++;
    }
    $dan++;
}
// for문과 달리 초기화 작업이 안되다보니 우리가 알아서 다 해줘야함