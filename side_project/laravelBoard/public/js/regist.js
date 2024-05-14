// document.querySelector('#btn-chk-email').addEventListener('click', () => {

//     const email = document.querySelector('#u_email').value;
//     const url = '/user/email'; 

//     // 폼데이터 생성
//     const formData = new FormData();
//     formData.append('u_email', email);

//     axios.post(url, formData)
//     .then(res => {
//         const errMsg = document.querySelector('#div-error-msg');
//         const printChkEmail = document.querySelector('#print-chk-email');
//         const btnComplete = document.querySelector('#my-btn-complete');
//         if(res.data.errorFlg) {
//             // 이메일 체크 실패 처리
//             errMsg.innerHTML = res.data.errorMsg.join('<br>');
//             printChkEmail.textContent = '사용 불가';
//             printChkEmail.classList = 'text-danger fw-bold';
//             btnComplete.setAttribute('disabled', 'disabled');
//         }
//         else {
//             // 이메일 체크 정상 처리
//             errMsg.innerHTML = "";
//             printChkEmail.textContent = '사용 가능';
//             printChkEmail.classList = 'text-primary fw-bold';
//             btnComplete.removeAttribute('disabled');
//         }
        
//     })
//     .catch(err => console.log(err));
// });


document.querySelector('#btn-chk-email').addEventListener('click', chkEmail);
async function chkEmail() {
    try {
        const email = document.querySelector('#email').value;
        const url = '/user/chk';
        
        // form 생성
        const form = new FormData();
        form.append('email', email);
    
        // ajax 처리
        const response = await axios.post(url, form);
        const btnCom = document.querySelector('#btn-com'); 
        const printChkEmail = document.querySelector('#print-chk-email'); 
        printChkEmail.innerHTML = '';
        // 정상처리
        if(response.data.emailFlg) {
            // 중복 이메일
            printChkEmail.innerHTML = '사용불가';
            printChkEmail.classList = 'text-danger';
            btnCom.setAttribute('disabled', 'disabled');
        }
        else {
            // 사용 가능 이메일'
            printChkEmail.innerHTML = '사용가능';
            printChkEmail.classList = 'text-success';
            btnCom.removeAttribute('disabled');
        }
    }
    catch (error) {
        // 이메일 체크 처리 에러 발생
        alert('회원 가입 실패');
        console.log(error.response.data);
    }
}