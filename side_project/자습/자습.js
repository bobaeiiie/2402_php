const AREA = document.querySelector('.con');
AREA.addEventListener('click', memo);


function memo(e) {
    const MEMO_X = e.clientX;
    const MEMO_Y = e.clientY;

    const INPUT = document.createElement('input');
    INPUT.type = 'text';
    INPUT.placeholder = '메모를 입력하세요';
    INPUT.classList.add('in-memo');

    INPUT.style.position = 'absolute';
    INPUT.style.left = `${MEMO_X}px`;
    INPUT.style.top = `${MEMO_Y}px`;

    AREA.appendChild(INPUT);
    // AREA.removeEventListener('click', memo);
}

