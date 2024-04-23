// 요소 선택
// -----------------------
// 고유한 id로 요소를 선택
const TITLE = document.getElementById('title');

// 태그명으로 요소를 선택
const H1 = document.getElementsByTagName('h1');

// 클래스 요소를 선택
const CLASS_ELE = document.getElementsByClassName('none-li');

// CSS 선택자를 이용해서 요소를 선택
const CSS_ID = document.querySelector('#title');
const CSS_CLS = document.querySelector('.none-li'); // 자주 사용
const CSS_CLS_ALL = document.querySelectorAll('.none-li');  // 자주 사용

const CSS_CLS_1 = document.querySelectorAll('ul > li');
console.log(CSS_CLS_1[1]);
const CSS_CLS_2 = document.querySelectorAll('.none-li')[1];
console.log(CSS_CLS_2);
const CSS_CLS_3 = document.querySelector('#ul > li:nth-child(2)');
console.log(CSS_CLS_3);

// CSS_CLS_ALL에 획득한 모든 요소 글자색 변경
// CSS_CLS_ALL.forEach(node => node.style.color = 'grey');
// CSS_CLS_3.style.color = 'pink';

// 요소 조작
// -----------------------
// textContent : 컨텐츠를 획득 또는 변경, 순수 텍스트데이터를 전달
TITLE.textContent = '텍스트 컨텐츠로 바꿈';
TITLE.textContent = '<a>링크</a>';

// innerHTML : 컨텐츠를 획득 또는 변경, 태그는 태그로 인식해서 전달
TITLE.innerHTML;
TITLE.innerHTML = '<a>링크</a>'

// setAttribute(속성명, 값) : 해당 속성과 값을 요소에 추가
const INPUT1 = document.getElementById('input1');
INPUT1.setAttribute('placeholder', '값값값');
INPUT1.setAttribute('name', 'input1');

// removeAttribute(속성명) : 해당 속성을 요소에서 제거
INPUT1.removeAttribute('placeholder');


// 요소 스타일링
// -----------------------
// style : 인라인으로 스타일 추가, 제거
TITLE.style.color = 'blue';
H1[1].style = 'color: green; font-size: 3rem;';
TITLE.style = '';
INPUT1.removeAttribute('style');

// classList : 클래스로 스타일 추가 및 삭제
// classList.add() : 추가
TITLE.classList.add('font-color-red');
TITLE.classList.add('font-color-red', 'css2', 'css3', 'css4');

// classList.remove() : 삭제
TITLE.classList.remove('font-color-red');
// classList.toggle() : 해당 클래스를 토글 처리
TITLE.classList.toggle('font-color-red');

// 리스트의 요소들의 글자색을 짝수는 빨강, 홀수는 파랑으로 수정
// CSS_CLS_COLOR.forEach((a,num) => {
    //     if(num % 2 === 0 ) {
        //         CSS_CLS_COLOR.classList.add('font-color-red');
        //     }
        //     else {
            //         CSS_CLS_COLOR.classList.add('font-color-blue');
            //     }
            // });
            
const CSS_CLS_COLOR = document.querySelectorAll('li');
CSS_CLS_COLOR.forEach((CSS_CLS_COLOR, num) => {
    if(num % 2 === 0 ) {
        CSS_CLS_COLOR.classList.add('font-color-red');
    }
    else {
        CSS_CLS_COLOR.classList.add('font-color-blue');
    }
});

// 다른 방법
const UL_LI_ODD = document.querySelectorAll('#ul li:nth-child(odd)');
UL_LI_ODD.forEach(node => node.style.color = 'red');
const UL_LI_EVEN = document.querySelectorAll('#ul li:nth-child(even)');
UL_LI_EVEN.forEach(node => node.style.color = 'blue');













// 실습 문제
// const CSS_1 = document.querySelectorAll('ul > li');
// const CSS_2 = [...CSS_1];
// CSS_2.splice(1, 0, '장기');
// console.log(CSS_2);






// const CSS_CLS_4 = document.querySelector('#ul > li:nth-child(9)');
// CSS_CLS_4.style.backgroundColor = 'beige';