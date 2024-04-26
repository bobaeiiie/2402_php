const AREA = document.querySelector('.con');
// const MEMO_CON = document.querySelector('.memo-con');
// const IN_MEMO = document.querySelector('.in-memo');
AREA.addEventListener('click', memo);


let inputElement = null;

function memo(e) {
    if (e.target.classList.contains('in-memo')) {
        return;
    }
    const MEMO_X = e.clientX;
    const MEMO_Y = e.clientY;

    if(!inputElement){
        const DIV = document.createElement('div');
        DIV.classList.add('memo-con');
        const INPUT = document.createElement('input');
        INPUT.type = 'text';
        INPUT.placeholder = '메모 입력';
        INPUT.classList.add('in-memo');
        INPUT.style.position = 'absolute';
        INPUT.style.left = `${MEMO_X}px`;
        INPUT.style.top = `${MEMO_Y}px`;
        DIV.appendChild(INPUT);
        DIV.style.backgroundImage = 'url(./)';
        AREA.appendChild(DIV);
    }
    
    AREA.addEventListener('click', memo);
}

// let memo_color = 1

// let memo_color_2 = `url(./image/memo_${memo_color}.png)`