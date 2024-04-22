// 함수 (function)
// 입력을 받아 출력을 하는 일련의 과정을 정의한 것

// 함수 선언식
// 호이스팅에 영향을 받고, 재할당이 가능함
function mySum(a, b) {
    return a + b;
}
console.log(mySum);

function mySum(a, b) {
    console.log('재할당');
}

// 함수 표현식
// 호이스팅에 영향을 받지 않고, 재할당을 방지함

// 익명함수: 이름을 지정하지 않은 함수
const FNC_MY_SUM = function(a, b) {
    return a + b;
}
// 자바스크립트에서는 함수가 객체이기 때문에 상수에 담는 구성이 가능

// 화살표 함수
// ECMA6에서 추가됨
const FNC_MY_SUM2 = (a, b) => a + b;


// 파라미터 없을 경우
const FNC_TEST1 = function() {
    return 'FNC_TEST1';
}
const FNC_TEST1_A = () => 'FNC_TEST1';
console.log(FNC_TEST1_A());

FNC_TEST1_A();

// 파라미터가 한개일 경우 소괄호 생략 가능
const FNC_TEST2 = function(str) {
    return str;
}
const FNC_TEST2_A = str => str;


// 리턴처리 이외의 처리가 있을 경우 중괄호 생략 불가능
const FNC_TEST3 = function(str) {
    if(str === 'a') {
        str = 'a입니다.';
    }
    return str;
}
const FNC_TEST3_A = str => {
    if(str === 'a') {
        str = 'a입니다.';
    }
    return str;
}

// 콜백 함수
// 다른 함수의 파라미터로 전달되어 특정 조간에 따라 호출되는 함수

const MY_SUB = (callBack, num) => {
    if(num === 3) {
        return '3입니다.';
    } 
    return callBack() - num;    
}

const MY_CALLBACK = () => 10;
console.log(MY_SUB(MY_CALLBACK, 3));


// 즉시 실행 함수 (IIFE)
// 함수의 정의와 동시에 바로 호출되는 함수
// 단 한번만 호출되고 다시는 호출 불가
// 모듈화, 스코프 보호, 클로저 형성

const MY_CLASS = (function() {
    const NAME = '홍길동';

    return {
        myPrint: function() {
            console.log(NAME + '입니다.');
        }
    }
})();
console.log(MY_CLASS.myPrint());