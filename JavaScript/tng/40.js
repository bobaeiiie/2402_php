const BTN = document.querySelector('#btn_id');
BTN.addEventListener('click', () => (alert('안녕하세요.\n숨어있는 div를 찾아보세요')));
const BTN2 = document.querySelector('#btn_move');
BTN2.addEventListener('click', fnc_xy);

const CON = document.querySelector('.con');
const BOX = document.querySelector('.box');
CON.addEventListener('mouseenter', alert1);
BOX.addEventListener('click', alert2);  
BOX.addEventListener('click', alert3);  

function fnc_xy(){
    const RANDOM_X = Math.ceil(Math.random() * 812);
    const RANDOM_Y = Math.ceil(Math.random() * 557);
    CON.style.position = 'absolute'; 
    CON.style.left = `${RANDOM_X}px`;
    CON.style.top = `${RANDOM_Y}px`;
    return { x: RANDOM_X, y: RANDOM_Y }
}

const XY = fnc_xy();


function alert1() {
    alert('두근두근');
}

function alert2(e) {
    alert('들켰다!');
    e.target.style.backgroundColor = 'pink';
    CON.removeEventListener('mouseenter', alert1);
    BOX.removeEventListener('click', alert2);
    BOX.removeEventListener('click', alert3);
    BOX.addEventListener('click', alert3); 
}

function alert3(e) {
    alert('다시 숨는다.');
    e.target.style.backgroundColor = 'white';
    BOX.removeEventListener('click', alert3);
    CON.addEventListener('mouseenter', alert1); 
    BOX.addEventListener('click', alert2); 
    BOX.addEventListener('click', alert3); 
    const XY = fnc_xy();
    CON.style.position = 'absolute'; 
    CON.style.left = `${XY.x}px`;
    CON.style.top = `${XY.y}px`;
}

// function toggleBox() {
//     const TOGGLE_BOX = document.querySelector('.box');
//     TOGGLE_BOX.classList.toggle('bgc');
// }

// const RANDOM_X = Math.ceil(Math.random() * 812);
// const RANDOM_Y = Math.ceil(Math.random() * 557);

// CON.style.position = 'absolute';
// CON.style.left = '${RANDOM_X}px';
// CON.style.right = '${RANDOM_Y}px';