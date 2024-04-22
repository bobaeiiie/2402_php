// ------------------
// 조건문 (if, switch)
// ------------------

// if(조건) {
//     처리
// } else if(조건) {
//     처리
// } else {
//     처리
// }

// 1등이면 1등, 2등이면 2등, 3등이면 3등,
// 나머지는 순위 외, 5번만 특별상을 출력
let num = 2;
if(num === 1) {
    console.log('1등')
} else if(num === 2) {
    console.log('2등')
} else if(num === 3) {
    console.log('3등')
} else if(num === 5){
    console.log('특별상')
} else {
    console.log('순위 외')
}

// 다른 방법
// let num = 1;
// if(num <= 3) {
//     console.log(num + '등')
// } else if(num === 5){
//     console.log('특별상')
// } else {
//     console.log('순위 외')
// }

// 나이가 20이면 20대, 30이면 30대, 나머지는 모르겠다.
let age = 29;
switch(age) {
    case 20:
        console.log('20대');
        break;
    case 30:
        console.log('30대');
        break;
    default:
        console.log('모르겠다');
        break;
}

// ------------------
// 반복문 (for, while, do_while)
// ------------------

for(let i = 1; i < 5; i *= 2) {
    console.log(i + '번째 루프');
}


for(let i = 1; i < 11; i++) {
    if(i % 3 === 0) {
        continue;
    }
    console.log(i + '번째 루프');
}

for(let i = 1; i < 11; i++) {
    if(i % 3 === 0) {
        continue;
    }
    console.log(i + '번째 루프');
    if(i === 7) {
        break;
    }
}


let cnt = 1;
while(cnt <= 10) {
    if(cnt % 3 === 0) {
        cnt++;
        continue;
    }
    console.log(cnt+ '번째 루프');

    if(cnt === 7) {
        break;
    }
    cnt++;
}

// 구구단 2단
let dan = 2;
for(let num = 1; num < 10; num++){
    console.log(dan + ' X ' + num + ' = ' + (dan * num));
}

// 구구단 9단까지
for(let dan = 2; dan < 10; dan++){
    console.log('** ' + dan + '단 **');
    for(let num= 1; num < 10; num++){
        console.log(dan + ' X ' + num + ' = ' + (dan * num));
    }
}

// 구구단 19단까지
for(let dan = 2; dan < 20; dan++){
    console.log('** ' + dan + '단 **');
    for(let num= 1; num < 20; num++){
        console.log(dan + ' X ' + num + ' = ' + (dan * num));
    }
}

// 강사님 풀이
const DAN = 9;
for(let dan = 2; dan <= DAN; dan++) {
    console.log(`**${dan}단**`);
    for(let multi = 1; multi <= DAN; multi++) {
        console.log(`${dan} X ${multi} = ${dan * multi}`);
    }
}


// for...in
// 모든 객체를 반복하는 문법
// key에만 접근이 가능
const OBJ = {
    key1: 'val1'
    ,key2: 'val2'
};

for(let key in OBJ) {
    console.log(OBJ[key]);
}

const ARR1 = [1,2,3];

for(let key in ARR1) {
    console.log(ARR1[key]);
}

// for...of
// iterable 객체를 반복하는 문법
// iterable: 순서가 정해져있는 객체 (String, Array, Map, Set, Typearray..)
// value에만 접근이 가능

const STR1 = '안녕하세요';
for(let val of STR1) {
    console.log(val);
}


// 별찍기 1
for(let i = 1; i < 6; i++){
    let stars = '';
    for (let j = 1; j < 6; j++) {
        stars += '*';
    }
    console.log(stars);
}


// 별찍기 2
for(let i = 1; i < 6; i++){
    let stars = '';
    for (let j = 0; j < i; j++) {
        stars += '*';
    }
    console.log(stars);
}


// 별찍기 3
for(let i = 1; i <= 5; i++){
    let blank = ' ';
    let stars = '';
    for (let j = 1; j <= 5 - i; j++) {
        stars += ' ';
    }
    for (let k = 1; k <= i; k++) {
        stars += '*';
    }
    console.log(blank + stars);
}