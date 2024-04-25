const AREA = document.querySelector('.con');
AREA.addEventListener('click', memo);
const IN_MEMO = document.querySelector('.in-memo');


let inputElement = null;

function memo(e) {
    if (e.target.classList.contains('in-memo')) {
        return;
    }
    const MEMO_X = e.clientX;
    const MEMO_Y = e.clientY;
    if(!inputElement){
        const INPUT = document.createElement('input');
        INPUT.type = 'text';
        INPUT.placeholder = '메모 입력';
        INPUT.classList.add('in-memo');
        INPUT.style.position = 'absolute';
        INPUT.style.left = `${MEMO_X}px`;
        INPUT.style.top = `${MEMO_Y}px`;
        AREA.appendChild(INPUT);
    }
    
    AREA.addEventListener('click', memo);
}

// IN_MEMO.style.backgroundImage = 'url(./image/memo_1.png)';