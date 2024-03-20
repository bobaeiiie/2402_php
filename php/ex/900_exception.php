<?php

// 예외 처리
// 로직 잘못 짜거나 산술 연산 오류등의 원인으로 시스템 멈추는 현상을 방지

// try, catch, finally
try {
    // 예외가 발생할 로직을 작성
    $i = 5 / 1;
    echo "\$i의 값은 : ".$i."\n"; // 이스케이프. 변수가 아닌 문자로 인식하게 함
}
// catch(\Throwable $eDome) { 
//     // 캐치문을 연속으로 이어서 처리 가눙
// 내가 캐치하고 싶은 예외처리 인터페이스 및 클래스의 계층이 낮을 수록 위에 적어야 함(노션)
// }
catch(\Throwable $e) { // \는 네임스페이스. Throwable 상속관계에서 최상위
    // 예외가 발생했을 때 처리를 작성 
    echo "예외 발생 : ".$e->getMessage()."\n";
}
finally {
    // 예외 발생 여부와 상관없이 무조건 마지막 실행
    // finally는 생략 가능
    echo "finally\n";
}

echo "계산 완료";

// 정상 동작 출력
// $i의 값은 : 5
// finally
// 계산 완료

// 예외 처리 출력
// 예외 발생 : Division by zero
// finally
// 계산 완료
