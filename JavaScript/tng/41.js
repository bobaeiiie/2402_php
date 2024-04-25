const NOW_ID = document.querySelector('#now_id');
const STOP = document.querySelector('#stop');
const RESTART = document.querySelector('#restart');
const AMPM_ID = document.querySelector('#ampm');
const HOUR_ID = document.querySelector('#hour');
const MIN_ID = document.querySelector('#minute');
const SEC_ID = document.querySelector('#second');

// setTimeout에 사용할 함수
function timeFnc() {
    // 시간 두자리수로 쓰기 위해 앞에 0 붙이기
    const lpadZero = (val, length) => {
        return String(val).padStart(length, '0');
    }
    // 현재 시간 담기
    const NOW = new Date();
    let hour = NOW.getHours();
    const MINUTE = lpadZero(NOW.getMinutes(), 2);
    const SECOND = lpadZero(NOW.getSeconds(), 2);

    // 오전/ 오후, 12시간 가공하기
    if(hour >= 12) {
        AMPM = '오후';
        if(hour > 12) {
            hour -= 12;
            if(hour < 10) {
                hour = '0' + hour;
            }
        }
    }
    else {
        AMPM = '오전';
    }

    // 출력
    AMPM_ID.innerHTML = AMPM;
    HOUR_ID.innerHTML = `${hour}:`;
    MIN_ID.innerHTML = `${MINUTE}:`;
    SEC_ID.innerHTML = SECOND;
}

// 초 단위로 시간 바뀌게 
let interval = setInterval(timeFnc, 1000);

// 멈춤 버튼
STOP.addEventListener('click', () => {
    clearInterval(interval);
});

// 재시작 버튼
RESTART.addEventListener('click', () => {
    interval = setInterval(timeFnc, 1000);
});