// Promise 프로미스 객체
// 콜백 지옥을 개선하기 위해 등장한 기법
// JS의 비동기 프로그래밍에서 근간이 되는 기법

const PRO = (str, ms) => {
	return new Promise((resolve, reject) => {
		setTimeout(()=>{
            if(str === 'A') {
                resolve('성공 : A임'); // 작업 성공 resolve() 호출
            } else {
                reject('실패 : A아님'); // 작업 실패 reject() 호출
            }
		}, ms);
	});
}

// Promise 호출
PRO('C', 1000)
.then(result => console.log('then : ' + result)) // resolve가 호출됐을 때
.catch(err => console.log('catch : ' + err)) // reject가 호출됐을 때

// 콜백 지옥 개선하기

const PRO2 = (str, ms) => {
    return new Promise((resolve) => {
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    });
}

PRO2('A', 3000)
.then(() => PRO2('B', 2000))
.then(() => PRO2('C', 1000))
.catch(() => console.log('에러'))
.finally(() => console.log('파이널리'));

// 병렬 처리 방법 (Promise.all())
const myLoop = cnt => {
    for(let i = 0; i < cnt; i++) {

    }
    console.log('myLoop 종료 : ' + cnt);
}

myLoop(100000000);
myLoop(10000000);
myLoop(1000000);

// Promise 병렬처리
// 세개의 결과를 한번에 출력하므로 가장 오래 걸리는 처리가 끝나야 출력
// Promise.all([myLoop(100000000), myLoop(10000000), myLoop(1000000)]);