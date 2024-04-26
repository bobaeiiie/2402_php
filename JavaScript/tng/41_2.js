const leftPadZero = (target, length, fillStr) => {
    return String(target).padStart(length, fillStr);
}

// 포맷 -> 오전 09:10:30
const GET_DATE = () => {
    const NOW = new Date(); // Date 객체(현재시간) 생성
    let hour = NOW.getHours(); // 시 획득 (24시 포맷)
    let minute = NOW.getMinutes(); // 분 획득
    let second = NOW.getSeconds(); //초 획득
    let ampm = '오전'; // 오전, 오후
    let hour_12 = hour; // 시 저장 (12시 포맷)
    if(hour > 12) {
        ampm = '오후'
        hour_12 = hour - 12;
    }

    let printTime = 
        ampm + ' ' 
        + leftPadZero(hour_12, 2, '0') + ':'
        + leftPadZero(minute, 2, '0') + ':'
        + leftPadZero(second, 2, '0');

        // leftPadZero 함수를 굳이 만들지 않고 가공하는 방법
        // + String(hour_12).padStart(2, '0') + ':'
        // + String(minute).padStart(2, '0') + ':'
        // + String(second).padStart(2, '0');
    // console.log(printTime);

    const SPAN_TIME = document.querySelector('#time');
    SPAN_TIME.textContent = printTime;

}

// 즉시 실행 함수. 최초 한번만 실행되게 함
// (() => {
//     GET_DATE();
// })();

GET_DATE();
// 인터벌 실행되면 자신의 ID값 리턴함, 이후 지워야 하는 처리가 있다면 변수에 저장
let intervalID = setInterval(GET_DATE, 1000);

// STOP 버튼
const BTN_STOP = document.querySelector('#stop');
BTN_STOP.addEventListener('click', () => {
    clearInterval(intervalID);
})

//RESTART 버튼
const BTN_RESTART = document.querySelector('#restart');
BTN_RESTART.addEventListener('click', () => {
    // 딜레이 없애기. 재시작 버튼 클릭과 동시에 현재시간 화면에 띄우기
    GET_DATE();
    intervalID = setInterval(GET_DATE, 1000);
})