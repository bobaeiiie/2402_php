// api 호출 버튼 이벤트
const BTN_API = document.querySelector('#btn_api');
BTN_API.addEventListener('click', myGetData);

// 지우기 버튼 이벤트
// const TEST = document.querySelector('.main');
// TEST.innerHTML = '';
const BTN_CLEAR = document.querySelector('#btn_clear'); 
BTN_CLEAR.addEventListener('click', () => {
    // const MAIN = document.querySelector('.main');
    // MAIN.innerHTML = '';

    // 최대 5개까지씩 지우기
    const MAIN = document.querySelector('.main');
    const articleList = document.querySelectorAll('.article');

    for(let i = 0; i < 5; i++) {
        let idx = articleList - 1 - i; // index 계산
        if(idx > 0) { 
            // index가 0보다 적으면 루프 종료
            break;
        }
        MAIN.removeChild(articleList[idx]); // 해당 아티클 삭제
    }
});

// api 호출
function myGetData() {
    // url 획득
    const url = document.querySelector('#input-url').value;

    // api 요청
    axios.get(url)
    .then(response => {
        sondole.log(response);
        myMakeItem(response.data);
    })
    .catch(err => console.log(err)); 
}

// async await 방식
async function myGetData() {
    // url 획득
    const url = document.querySelector('#input-url').value;

    // api 요청
    try {
        const response = await axios.get(url);
        myMakeItem(response.data);
    }
    catch(error) {
        console.log(error);
    }
}


function myMakeItem() {
    data.forEach(item => {
        // 아이템을 추가할 부모 요소 획득
        const MAIN = document.querySelector('.main');
        
        // 아이템 생성
        const newArticle = document.createElement('div');
        const newArticleId = document.createElement('div');
        const newImg = document.createElement('div');

        // 아이템 data 셋팅
        new newArticle.classList = 'article';
        newArticleId.classList = 'div-article-id';
        newImg.classList = 'div-article-img';
        newArticleId.innerHTML = item.id;
        newImg.src = item.download_url;

        // 생성한 요소 결합
        newArticle.appendChild(newArticleId); 
        newArticle.appendChild(newImg);
        MAIN.appendChild(newArticle);
         
    });
}
