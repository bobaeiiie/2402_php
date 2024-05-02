const BTN_DETAIL = document.querySelectorAll('.my-btn-detail').forEach(item => {
    item.addEventListener('click', () => {
        const url = '/board/detail?b_id=' + item.value;
        console.log(url);
        
        // AJAX 처리 함수
        axios.get(url)
        .then(response => {
            const data = response.data[0];
            
            const modalTitle = document.querySelector('.modal-title'); // 제목 노드
            const modalContent = document.querySelector('.modal-body > p'); // 내용 노드
            const modalImg = document.querySelector('.modal-body > img'); // 이미지 노드
            
            // 상세 정보 셋팅
            modalTitle.textContent = data.b_title;
            modalContent.textContent = data.b_content;
            modalImg.src = data.b_img;
            
        })
        .catch(err => console.log(err));
    });
});
