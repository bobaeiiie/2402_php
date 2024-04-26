const IMG_CON = document.querySelector('.img_con');

function axiosGet() {
    // URL 획득
    const URL = document.querySelector('#url').value;

    // axios 처리
    axios.get(URL)
    .then(response => {
        printImg(response.data);
    })
    .catch(err => console.log(err))
    ;
}

function printImg(data) {
    data.forEach(item => {
        // div 생성
        const ADD_DIV = document.createElement('div');
        ADD_DIV.setAttribute('class', 'add_div');
        ADD_DIV.style.margin = '10px';
        ADD_DIV.style.padding = '10px';
        ADD_DIV.style.width = '300px';
        ADD_DIV.style.height = '300px';
        ADD_DIV.style.backgroundColor = 'beige';
        ADD_DIV.style.display = 'grid'; 
        ADD_DIV.style.placeItems = 'center'; 
        
        // 번호 생성
        const ADD_NUM = document.createElement('span');
        ADD_NUM.innerHTML= item.id;
        ADD_NUM.style.fontSize = '2rem';

        // img 생성
        const ADD_IMG = document.createElement('img');
        ADD_IMG.setAttribute('src', item.download_url);
        ADD_IMG.style.width = '270px';
        // ADD_IMG.style.height = '180px';
        ADD_IMG.style.padding = '20px 0 0 0';

        // 이미지 화면에 출력
        ADD_DIV.appendChild(ADD_NUM);
        ADD_DIV.appendChild(ADD_IMG);
        IMG_CON.appendChild(ADD_DIV);
    })
}

// API 호출 버튼 이벤트
const BTN_API = document.querySelector('#btn_api');
BTN_API.addEventListener('click', axiosGet);

// 지우기 버튼 이벤트
const BTN_CLEAR = document.querySelector('#btn_clear');
BTN_CLEAR.addEventListener('click', () => {
    IMG_CON.innerHTML = '';
});
