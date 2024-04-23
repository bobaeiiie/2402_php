// date 객체

// 요일 한글로 변환하는 함수
const changeDayToKoreanDay = num => {
    switch(num) {
        case 0:
            return '일요일';
        case 1:
            return '월요일';
        case 2:
            return '화요일';
        case 3:
            return '수요일';
        case 4:
            return '목요일';
        case 5:
            return '금요일';
        case 6:
            return '토요일';
            }
        }

// 앞에 0을 추가해주는 함수
const lpadZero = (val, length) => {
    return String(val).padStart(length, '0');
}


// 현재 날짜/시간 획득
const NOW = new Date();

// getFullYear() : 연도만 가져오는 메소드 (yyyy)
const YEAR = NOW.getFullYear();

// getFullMonth() : 월만 가져오는 메소드 0 ~ 11을 획득
const MONTH = lpadZero(NOW.getMonth() + 1, 2);

// getDate() : 일을 가져오는 메소드
const DATE = lpadZero(NOW.getDate(), 2);

// getHours() : 시를 가져오는 메소드
const HOUR = lpadZero(NOW.getHours(), 2);

// getMinutes() : 분을 가져오는 메소드
const MINUTE = lpadZero(NOW.getMinutes(), 2);

// getSeconds() : 초를 가져오는 메소드
const SECOND = lpadZero(NOW.getSeconds(), 2);

// getMilliseconds() : 초를 가져오는 메소드
const MILLISECOND = lpadZero(NOW.getMilliseconds(), 3);

// getDay() : 요일을 가져오는 메소드, 0(일) ~ 6(토)
const DAY = NOW.getDay();


// 익숙한 형태로 가공
const FOMAT_DATE = `${YEAR}-${MONTH}-${DATE} ${changeDayToKoreanDay(DAY)} ${HOUR}:${MINUTE}:${SECOND}:${MILLISECOND}`;


// 날짜 계산
// getTime() : UNIX 타임스탬프를 반환하는 메소드
const TIME = NOW.getTime();
const TARGET_DATE = new Date('2024-04-03 00:00:00');

// 일수 차이
// 1000*60*60*24 = 86400000 -> 밀리초*초*분*시간 = 하루의 총 밀리초
const DIFF_DATE = Math.floor(Math.abs(TARGET_DATE - NOW) / 86400000);

// 실습 1
// 기준일 : 2023-09-30 19:20:10
// 오늘로부터 몇일 전인지 구해주세요.
const TARGET_DATE_1 = new Date('2024-09-30 19:20:10');
const DIFF_DATE_1 = Math.floor(Math.abs(TARGET_DATE_1 - NOW) / 86400000);

// 실습 2 
// 두 날짜 사이의 개월 수 차이를 구하시오.
// 1000 * 60 * 60 * 24 * 30.42 -> 
const START_DATE = new Date('2024-01-01 13:00:00');
const END_DATE = new Date('2025-05-30 00:00:00');
const DIFF = Math.floor(Math.abs(START_DATE - END_DATE) / 2629568000); // 16
// 정확한 일수 차이 = 16개월 29일.

// 강사님 풀이
const TARGET_DATE1 = new Date(2024, 0, 1, 13); // 디폴트 값이 0
const TARGET_DATE2 = new Date('2025-05-30'); // 생성 방식 다양함
const DIFF_DATE2 = Math.floor(Math.abs(TARGET_DATE1 - TARGET_DATE2) / (1000*60*60*24*30)); // 17
