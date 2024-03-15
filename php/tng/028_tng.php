<?php

// 아래처럼 별을 찍어주세요.
// 예시)
// *****
// *****
// *****
// *****
// *****


// 별 다섯개로
$s5 = "*****";
for($i = 0; $i < 5; $i++) {
    echo "$s5";
    echo "\n";
}

echo "\n";

// 별 한개로
$s = "*";
for($i = 0; $i < 5; $i++) {
    for($z = 0; $z < 5; $z++) {
        echo $s;
    }
    echo "\n";
}

echo "\n";

// 아래처럼 별을 찍어주세요.
// 예시)
// *
// **
// ***
// ****
// *****

$s = "*";
for($i = 0; $i < 6; $i++) {
    for($z = 0; $z < $i; $z++) {
        echo $s;
    }
    echo "\n";
}

// 강사님 풀이
for($i = 0; $i < 6; $i++) {
    for($z = 0; $z < $i; $z++) {
        echo "*";
    }
    echo "\n";
}

echo "\n";

// 아래처럼 별을 찍어주세요.
// 예시)
//     *
//    **
//   ***
//  ****
// *****

// 내꺼 다시보기
// 값이 5보다 커지게 되면 활용할 수 없는 코드기 때문에 $z = 5로 두고 시작하면 곤란하다ㅏㅏ
$b = " ";
for($i = 1; $i < 6; $i++) {
    for($z = 5; $z > $i; $z--) {
        echo $b;
    }
    for($z = 1; $z <= $i; $z++) {
        echo $s;
    }
    echo "\n";
}

echo "\n";

// 강사님 풀이 ******************

// for문 1개 + if문 이용
$num = 5;
for($i = 1; $i <= $num; $i++) {
    $cnt_space = $num - $i; // 공백의 수를 미리 정함
    for($z = 1; $z <= $num; $z++) { // $z = 0, 1 차이 다시 분석 ******************
        if($z <= $cnt_space) {
            echo " ";
        }
        else {
            echo "*";
        }
    }
    echo "\n";
}

echo "\n";

// 다른 변수 저장 없이 if문 사용해서 짠 케이스
$num = 5;
for($i = 0; $i < $num; $i++) {
    for($z = $num-1; $z >= 0; $z--) { 
        if($z <= $i) {
            echo "*";
        }
        else {
            echo " ";
        }
    }
    echo "\n";
}

echo "\n";

// for문 2개 이용
for($i = 0; $i < $num; $i++) {
    for($z = 1; $z < $num - $i; $z++) {
        echo " ";
    }
    for($y = 0; $y <= $i; $y++) {
        echo "*";
    }
    echo "\n";
}

echo "\n";

$rows = 10;
for ($i = 1; $i <= $rows; $i++) {
    for ($j = $rows - $i; $j > 0; $j--) {
        echo " ";
    }
    for ($k = 1; $k <= 2 * $i - 1; $k++) {
        echo "*";
    }
    echo "\n";
}

echo "\n";

$dan = 2;
for ($dan = 2; $dan < 10; $dan++) {
    echo "** ".$dan."단 **\n";
    for($multi_num = 1; $multi_num < 10; $multi_num++) {
        echo $dan." X ".$multi_num." = ".($dan * $multi_num)."\n";
    }  
}