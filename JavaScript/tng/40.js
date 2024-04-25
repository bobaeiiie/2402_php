// 내 방법
// const BTN = document.querySelector('#btn_id');
// BTN.addEventListener('click', () => (alert('안녕하세요.\n숨어있는 div를 찾아보세요')));
// const BTN2 = document.querySelector('#btn_move');
// BTN2.addEventListener('click', fnc_xy);

// const CON = document.querySelector('.con');
// const BOX = document.querySelector('.box');
// CON.addEventListener('mouseenter', alert1);
// BOX.addEventListener('click', alert2);  
// BOX.addEventListener('click', alert3);  

// function fnc_xy(){
//     const RANDOM_X = Math.ceil(Math.random() * 812);
//     const RANDOM_Y = Math.ceil(Math.random() * 557);
//     CON.style.position = 'absolute'; 
//     CON.style.left = `${RANDOM_X}px`;
//     CON.style.top = `${RANDOM_Y}px`;
//     return { x: RANDOM_X, y: RANDOM_Y }
// }

// const XY = fnc_xy();


// function alert1() {
//     alert('두근두근');
// }

// function alert2(e) {
//     alert('들켰다!');
//     e.target.style.backgroundColor = 'pink';
//     CON.removeEventListener('mouseenter', alert1);
//     BOX.removeEventListener('click', alert2);
//     BOX.removeEventListener('click', alert3);
//     BOX.addEventListener('click', alert3); 
// }

// function alert3(e) {
//     alert('다시 숨는다.');
//     e.target.style.backgroundColor = 'white';
//     BOX.removeEventListener('click', alert3);
//     CON.addEventListener('mouseenter', alert1); 
//     BOX.addEventListener('click', alert2); 
//     BOX.addEventListener('click', alert3); 
//     const XY = fnc_xy();
//     CON.style.position = 'absolute'; 
//     CON.style.left = `${XY.x}px`;
//     CON.style.top = `${XY.y}px`;
// }

// 강사님 방법

const myDokidoki = () => {
    alert('두근두근2');
}

const myBusted = () => {
    const DIV_BOX = document.querySelector('.box');
    alert('들켰다!2');
    DIV_BOX.classList.toggle('busted'); // 배경색 부여
    DIV_CON.removeEventListener('mouseenter', myDokidoki); // 기존 두근두근 이벤트 제거
    DIV_BOX.removeEventListener('click', myBusted); // 기존 들켰다 이벤트 제거
    DIV_BOX.addEventListener('click', myHide)// 숨는다 이벤트 추가
}

const myHide = () => {
    const DIV_CON = document.querySelector('.con');
    const DIV_BOX = document.querySelector('.box');
    alert('다시 숨는다2');
    DIV_BOX.classList.toggle('busted'); // 배경색 부여
    DIV_BOX.removeEventListener('click', myHide); // 기존 숨는다 이벤트 제거
    DIV_BOX.addEventListener('click', myBusted); // 들켰다 이벤트 추가
    DIV_CON.addEventListener('mouseenter', myDokidoki); // 기존 두근두근 이벤트 추가
    // 랜덤 위치 조절
    // 랜덤값 * (브라우저 너비|높이 - div.com 너비|높이)의 반올림)
    const RANDOM_X = Math.round(Math.random() * 500);
    const RANDOM_Y = Math.round(Math.random() * 500);
    // 다른 방법 1
    // const RANDOM_XX = Math.round(Math.random() * (window.innerWidth - 100));
    // const RANDOM_YY = Math.round(Math.random() * (window.innerHeight - 100));
    // 다른 방법 2
    // const RANDOM_XXX = Math.round(Math.random() * (window.innerWidth - DIV_CON.offsetWidth));
    // const RANDOM_YYY = Math.round(Math.random() * (window.innerHeight - DIV_CON.offsetHeight));
    DIV_CON.style.top = `${RANDOM_Y}px`;
    DIV_CON.style.left = `${RANDOM_X}px`;
}

const XY = () => {
    const RANDOM_X = Math.round(Math.random() * 500);
    const RANDOM_Y = Math.round(Math.random() * 500);
    DIV_CON.style.top = `${RANDOM_Y}px`;
    DIV_CON.style.left = `${RANDOM_X}px`;
}

const BTN = document.querySelector('#btn_id');
BTN.addEventListener('click', ()=> (alert('안녕하세요.\n숨어있는 div를 찾아보세요.'))); 
const BTN2 = document.querySelector('#btn_move');
BTN2.addEventListener('click', XY);
window.addEventListener('load', XY);


const DIV_CON = document.querySelector('.con');
const DIV_BOX = document.querySelector('.box');
DIV_CON.addEventListener('mouseenter', myDokidoki);
DIV_BOX.addEventListener('click', myBusted);