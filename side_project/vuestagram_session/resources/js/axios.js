import axios from "axios";

const axiosIsntance = axios.create({
    // 기본 헤더 설정
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
    // axios로 api 요청할 때 세션 쿠키가 포함되도록 하는 설정 (기본 false)
    withCredentials: true,
});