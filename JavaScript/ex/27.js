// 배열
const ARR = [1,2,3,4,5];

console.log(ARR[2]);

ARR[5] = 6;
console.log(ARR);

// 배열의 길이를 획득
console.log(ARR.length);

ARR[ARR.length] = 7;
console.log(ARR.length);

// 배열 여부 체크
console.log(Array.isArray(ARR));
console.log(Array.isArray(1));

// indexOf(): 배열에서 특정 요소를 검색해 해당 인덱스를 획득하는 메소드
let arr = ['홍길동', '갑순이', '갑돌이'];
arr.indexOf('갑돌이');
if(arr.indexOf('갑돌이') < 0) {
    // 요소가 없을 때 처리
}


// includes(): 배열에서 특정 요소의 존재 여부를 체크, 리턴 boolean
arr.includes('홍길동');
if(!(arr.includes('홍길동'))) {
    // 요소가 없을 때 처리
}

// 배열 복사
arr = ['홍길동', '갑순이', '갑돌이'];
arr2 = [...arr]; // Spread Operator
arr2.push('반장님');

// push() : 원본 배열의 마지막 요소를 추가, 변경된 length를 리턴
arr = ['홍길동', '갑순이', '갑돌이'];
let len = arr.push('반장님');
arr.push('나미리', '둘리'); // 파라미터를 복수 설정해서 여러 값을 한번에 추가하기 쉬움

// pop() : 원본 배열의 마지막 요소를 제거, 제거된 요소의 값 반환
arr = ['홍길동', '갑순이', '갑돌이'];
let result = arr.pop();
console.log(arr);

// unshift() : 원본 배열의 첫 번 째 요소를 추가하고, 변경된 length를 반환
arr = ['홍길동', '갑순이', '갑돌이'];
result = arr.unshift('둘리');
console.log(result, arr);

// shift() : 원본 배열의 첫 번 째 요소를 제거하고, 제거된 요소의 값을 반환
result = arr.shift();
console.log(result, arr);

// splice() : 요소를 잘라서 자른 배열을 반환
arr = [1, 2, 3, 4, 5];
result = arr.splice(2); // 인덱스 번호 2부터 잘라서 버림
console.log(arr);  // [1, 2]
console.log(result); // [3, 4, 5]

arr = [1, 2, 3, 4, 5];
result = arr.splice(-2);
console.log(arr);  // [1, 2, 3]
console.log(result); // [4, 5]

arr = [1, 2, 3, 4, 5];
result = arr.splice(1, 2, 100, 200, 300);
console.log(arr); // [1, 100, 200, 300, 4, 5]
console.log(result); // [2, 3]

arr = [1, 2, 3, 4, 5];
result = arr.splice(2, 0, 100, 200);
console.log(arr); // [1, 2, 100, 200, 3, 4, 5]
console.log(result); // []

// join() : 배열의 요소를 구분자로 연결한 문자열을 만들어서 반환
// 구분문자는 디폴트가 ','
arr = [1, 2, 3, 4];
result = arr.join('');
console.log(result);

// sort() : 배열의 요소를 문자열로 변환 후 오름차순 정렬을 하고, 정렬된 배열을 반환
// 원본 변경됨
// (a - b)가 양수일 경우, a가 큰 수, b가 작은 수로 인식하여 정렬
// (a - b)가 음수일 경우, a가 작은 수, b가 큰 수로 인식하여 정렬
// (a - b)가 0일 경우, 같은 값으로 인식하여 정렬하지 않음
arr = [4, 3, 6, 1, 2, 5, 10];
result = arr.sort();
console.log(arr);
console.log(result);

// 파라미터로 콜백함수 
arr = [4, 3, 6, 1, 2, 5, 10];
result = arr.sort((a, b) => a - b); // 숫자 오름차순 정렬
result = arr.sort((a, b) => b - a); // 숫자 내림차순 정렬
console.log(arr);
console.log(result);

// map() : 배열의 모든 요소에 대해서 콜백 함수를 반복 실행한 후, 그 결과를 새 배열로 반환
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// 모든 요소에 값 * 2를 한 결과를 얻고 싶다.
result = arr.map(a => a * 2);
console.log(result);

// let copyArr = [];
// for(let val of arr) {
//     copyArr[copyArr.length] = val * 2;
// }
// console.log(copyArr);

let mapArr = arr.map(val => val * 2);
console.log(mapArr);

// some() : 배열의 모든 요소에 대해서 콜백 함수를 반복 실행하고, 
// 조건에 만족하는결과가 하나라도 있으면 true, 만족하는 결과가 하나도 없으면 flase 리턴
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
result = arr.some(val => val === 11);
console.log(result);


// every() : 배열의 모든 요소에 대해서 콜백 함수를 반복 실행하고, 
// 모든 결과가 만족하면 true, 하나라도 만족하지 않으면 false 리턴
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
result = arr.every(val => val >= 1);
console.log(result);


// filter() : 배열의 모든 요소에 대해서 콜백 함수를 반복 실행하고, 
// 조건에 맞는 요소만 모아 배열로 반환
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
result = arr.filter(val => val % 3 === 0);
console.log(result);


// forEach() : 배열의 모든 요소에 대해서 콜백 함수를 반복 실행
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
arr.forEach((val, key) => console.log(`key: ${key}, val: ${val}`));