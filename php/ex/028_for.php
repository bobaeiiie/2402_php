<?php

// foreach 와 while 가장 많이 사용
// for문 : 특정 처리를 반복적으로 구현하고자 할 때 사용하는 문법
for($i = 1; $i < 3; $i++) { // 반복할 처리 (초기값; 조건; i값 1씩 증가)
    echo $i."번째 루프\n";
}
echo "\n";
for($i = 0; $i < 10; $i++) { // 반복할 처리 (초기값; 조건; i값 1씩 증가)
    if($i === 3) {
        break; // 특정 조건일 때 루프문 종료. if와 break 응용
    }
    echo $i," ";
}
// 무한루프 끄는 방법: 애초에 무한루프 되지 않게 주의하고 작업관리자에서 껐다 켜기

//continue : continue 아래의 처리를 건너뛰고 그 다음 루프로 진행

// 3,6,9는 출력하고 싶지 않을 때
echo "\n";
for($i = 0; $i < 10; $i++) { 
    if($i === 3 || $i === 6 || $i === 9 ) {
        continue; // 종료시키지 않고 진행됨 조건 충족 시 echo처리를 만나지 않는다
    }
    echo $i," ";
}
echo "\n";
// 배열 루프
echo "\n";
$arr = [1,2,3,4,5,6,7,8,9,10];
$loop_cnt = count($arr);
for($i = 0; $i < $loop_cnt; $i++) {
    echo $arr[$i];
}

for($i = 0; $i < 10; $i++) { 
    if($i === 3 || $i === 6 || $i === 9 ) {
        continue; // 종료시키지 않고 진행됨 조건 충족 시 echo처리를 만나지 않는다
    }
    echo $i," ";
}
echo "\n";

// 다중루프
for($i = 1; $i < 3; $i++) {
    echo "1번 LOOP : ".$i."번째\n";
    for($z = 1; $z < 3; $z++) {
        echo "\t2번 LOOP : ".$z."번째\n"; // \t는 인덴트 발생
    } // 이중루프
}


for($i = 1; $i < 3; $i++) {
    echo "1번 LOOP : ".$i."번째\n";
    for($z = 1; $z < 3; $z++) {
        echo "\t2번 LOOP : ".$z."번째\n";
    }
}

// 구구단 2단 
$dan = 2;
for($multi_num = 1; $multi_num < 10; $multi_num++) { // 9보다 크거나 같다라고 써도 됨
    $msg_line = $dan." X ".$multi_num." = ".($dan * $multi_num)."\n";
    echo $msg_line;
}

// 구구단 9단까지
for($dan = 2; $dan < 10; $dan++) { //꼭 정수로 증감할 필요 없음 +2.5가능
    echo "\n** ".$dan."단 **\n";
    for($multi_num = 1; $multi_num < 10; $multi_num++) {
        $msg_line = $dan." X ".$multi_num." = ".($dan * $multi_num)."\n";
        echo $msg_line;
    }
}
