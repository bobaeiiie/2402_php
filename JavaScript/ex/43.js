// Axios
// http 메소드가 get
axios.get('https://picsum.photos/v2/list?page=18&limit=5')
// axios.post();
// axios.put();
// axios.delete();
.then(response => {
    console.log(response);
    console.log(response.data); // 필요 데이터
})
.catch(err => console.log(err))
.finally(() => console.log('finally'))
;

function myAxiosGet() {
    // URL 획득
    const URL = document.querySelector('#input_url').value;

    // axios 처리
    axios.get(URL)
    .then(response => {
        myMakeImg(response.data);
    })
    .catch(err => console.log(err));
}

// 사진 데이터를 화면에 추가하는 함수
function myMakeImg(data) {
    data.forEach(item => {
        // 부모요소 접근
        const IMG_CON = document.querySelector('.img_con');

        // img 태그 생성
        const ADD_IMG = document.createElement('img');
        ADD_IMG.setAttribute('src', item.download_url);
        ADD_IMG.style.width = '300px';
        ADD_IMG.style.height = '200px';

        // 이미지 화면에 추가
        IMG_CON.appendChild(ADD_IMG);
    });
}

const BTN_API = document.querySelector('#btn_api');
// API 호출 버튼 이벤트
BTN_API.addEventListener('click',myAxiosGet);