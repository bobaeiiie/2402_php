// 240422 실습

// 원본은 보존하면서 오름차순 정렬 해주세요
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];

ARR1_1 = [...ARR1];
result = ARR1_1.sort((a, b) => a - b);
console.log(ARR1); // [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40]
console.log(result); // [3, 3, 5, 5, 6, 7, 8, 40, 80, 92, 100]


// 짝수와 홀수로 분리해서 각각 새로운 배열 만들어 주세요.
const ARR2 = [5, 7, 3, 4, 5, 1, 2];

// 짝수
result1 = ARR2.filter(val => val % 2 === 0);
console.log(result1); // [4, 2]
// 홀수
result2 = ARR2.filter(val => val % 2 !== 0);
console.log(result2); // [5, 7, 3, 5, 1]