// 타이머 함수

//setTimeout(콜백함수, 시간(ms)[, 아규먼트1, 아규먼트2]) : 일정 시간이 흐른 뒤에 콜백 함수를 실행
// setTimeout(() => (console.log('타임아웃')), 5000);
// 1초 뒤 a, 2초 뒤 b, 3초 뒤 c 출력
// setTimeout(() => (console.log('a')), 1000);
// setTimeout(() => (console.log('b')), 2000);
// setTimeout(() => (console.log('c')), 3000);

// 비동기 처리
// a, c, b 순서로 실행
// console.log('a');
// setTimeout(() => (console.log('b')), 1000);
// console.log('c');

// a, b, c 순서로 실행하고 싶은 경우
// console.log('a');
// setTimeout(() => {
//     console.log('b');
//     console.log('c');
// },1000);

// clearTimeout(타임아웃ID) : 해당 타임아웃ID의 처리를 제거
// const TIMEOUT_ID = setTimeout(()=> console.log('ttt'), 5000);
// clearTimeout(TIMEOUT_ID);
// console.log(TIMEOUT_ID);

// setInterval(콜백함수, 시간(ms)[, 아규먼트1, 아규먼트2]) : 일정 시간마다 콜백함수를 실행
// const INTERVAL_ID = setInterval(() => {
//     console.log('인터벌', cnt);
//     cnt++;
// }, 1000);

// clearInterval(인터벌ID) : 해당 인터벌ID 처리 제거
// clearInterval(INTERVAL_ID);

// 화면에 5초 뒤에 '두둥등장'이라는 매우 큰 글씨가 나타나게 해주세요.
const H1 = document.createElement('h1');
const BODY = document.querySelector('body');
H1.textContent = '두둥등장';
H1.style.fontSize = 'rem';
H1.style.color = 'red';

// setTimeout(() => {
//     BODY.appendChild(H1)
// }, 3000)
//     BODY.removeChild(H1)
// ;

// 강사님 풀이
// setTimeout(() => {
//     // 생성
//     const H1 = document.createElement('h1');
//     H1.innerHTML = '두둥등장';
//     H1.style.fontSize = '5rem';
//     document.body.appendChild(H1);
//     // 삭제
//     setTimeout(() => {
//         document.body.removeChild(H1);
//     }, 1000);
// }, 2000);


// 콜백 지옥
// 비동기 처리를 동기 처리처럼 만들기 위해서 아래처럼 콜백 지옥 현상이 생긴다.
// C B A
// setTimeout(() => console.log('A'), 3000);
// setTimeout(() => console.log('B'), 2000);
// setTimeout(() => console.log('C'), 1000);

setTimeout(() => {
    console.log('A');
    setTimeout(() => {
        console.log('B');
        setTimeout(() => {
            console.log('C');
        },1000);
    },2000);     
},3000);