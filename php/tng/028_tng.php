<?php

// 아래처럼 별을 찍어주세요.
// 예시)
// *****
// *****
// *****
// *****
// *****

$s5 = "*****";
for($i = 0; $i < 5; $i++) {
    echo "$s5";
    echo "\n";
}

// 아래처럼 별을 찍어주세요.
// 예시)
// *
// **
// ***
// ****
// *****

$s1 = "*";
for($i = 0; $i < 6; $i++) {
    for($z = 0; $z < $i; $z++) {
        echo $s1;
    }
    echo "\n";
}

// 아래처럼 별을 찍어주세요.
// 예시)
//     *
//    **
//   ***
//  ****
// *****

echo "\n";

$b = " ";
for($i = 1; $i < 6; $i++) {
    for($z = 5; $z > $i; $z--) {
        echo $b;
    }
    for($z = 1; $z <= $i; $z++) {
        echo $s1;
    }
    echo "\n";
}

echo "\n";

// $b = " ";
// for($i = 1; $i < 11; $i++) {
//     for($z = 5; $z > $i; $z--) {
//         echo $b;
//     }
//     for($z = 1; $z <= $i; $z++) {
//         echo $s1;
//     }
//     echo "\n";
// }


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
$dan = 2;
for ($dan = 2; $dan < 10; $dan++) {
    echo "** ".$dan."단 **\n";
    for($multi_num = 1; $multi_num < 10; $multi_num++) {
        echo $dan." X ".$multi_num." = ".($dan * $multi_num)."\n";
    }  
}
echo "강아지";