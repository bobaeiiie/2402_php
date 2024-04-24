// 이벤트

// 인라인 이벤트
function myAlert() {
    alert('안녕하세요. myAlert()');
}

// 프로퍼티 리스너
const btn2 = document.querySelector('#btn2');
// 괄호는 함수를 실행한다는 뜻.
// 소스코드를 읽을 때가 아닌 행위를 했을 때 콜백함수로서 실행되게 한다
btn2.onclick = myAlert;
btn2.onclick = () => (alert('안녕하세요.'));


// addEventListner
const btn3 = document.querySelector('#btn3');
btn3.addEventListener('click', () => (alert('버튼 3')));
btn3.addEventListener('click', function() {
    alert('버튼 33');
});
btn3.addEventListener('click', test);

// removeEventListener() : 이벤트 추가 시 사용했던 이벤트 형식과 콜백함수가 완전 동일해야 한다.
btn3.removeEventListener('click', function() {
    alert('버튼 33');
}); // 제거가 안됨
btn3.removeEventListener('click', test); // 제거 됨

// 함수 따로 지정
function test() {
    alert('test');
}

// Event Object 이벤트 객체
// 이벤트가 실행 됐을 때 자바스크립트가 자동으로 생성해주는 객체
// 콜백함수 파라미터 작성하면 자동으로 담김
// 특정 이벤트가 실행되면 그 때 이벤트 객체에 담긴 정보를 발생
// e.target = document.querySelector('#btn4');

const btn4 = document.querySelector('#btn4');
btn4.addEventListener('click', e => {
    console.log(e);
    console.log(e.target.value);
    e.target.style.color = 'red';
});

// -------------------------------
// Pop Up
const BTN_POPUP = document.querySelector('#popup');
BTN_POPUP.addEventListener('click', () => {
    open('https://naver.com', '', 'width=500 height=500');
    window.open('https://naver.com', '', 'width=500 height=500'); // window 생략 가능
})
// target 지정 안하면 새로운 탭 열림
// 단위는 자동으로 px

// Modal
const BTN_MODAL = document.querySelector('#modal');
BTN_MODAL.addEventListener('click', toggleModalContainer);

function toggleModalContainer() {
    const MODAL_CONTAINER = document.querySelector('.modal-container');
    MODAL_CONTAINER.classList.toggle('display-none');
}
// Modal Container 영역 클릭 시 Modal 닫기
const MODAL_CONTAINER = document.querySelector('.modal-container');
MODAL_CONTAINER.addEventListener('click', toggleModalContainer);

// Modal 아이템 영역 눌렀을 때 안꺼지게 하는 방법 중 하나
const TEST = document.querySelector('.modal-item');
TEST.addEventListener('click', toggleModalContainer);

// 마우스를 눌렀을 때 이벤트
const H1 = document.querySelector('h1');
H1.addEventListener('mousedown', e => {
    e.target.style.backgroundColor = 'pink';
    e.target.style.color = 'black';
}) 
// 마우스를 뗐을 때 이벤트
H1.addEventListener('mouseup', e => {
    e.target.style.backgroundColor = 'white';
}) 
// 마우스 포인터가 진입했을 때 이벤트
H1.addEventListener('mouseenter', e => {
    e.target.style.color = 'grey';
}) 
H1.addEventListener('mouseleave', e => {
    e.target.style.color = 'black';
}) 
// 더블클릭했을 때 이벤트
H1.addEventListener('dblclick', e => {
    e.target.style.color = 'yellow';
}) 



