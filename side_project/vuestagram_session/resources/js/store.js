import { createStore } from 'vuex';
import router from './router';

const store = createStore({
    state() {
        return {
            authFlg: document.cookie.indexOf('auth=') >= 0 ? true : false,
            userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : null,
            boardData: [],
            moreBoardFlg: true,
        }
    },
    mutations: {
        // 인증 플래그 저장
        setAuthFlg(state, flg) {
            state.authFlg = flg;
        },

        // 유저 정보 저장
        setUserInfo(state, userInfo) {
            state.userInfo = userInfo;
        },

        // 게시글 초기 삽입
        setBoardData(state, data) {
            state.boardData = data;
        },

        // 더보기 버튼 플래그
        setMoreBoardFlg(state, flg) {
            state.moreBoardFlg = flg;
        },

        // 더보기 게시글 추가
        setMoreBoardData(state, data) {
            state.boardData = [...state.boardData, ...data];
        },

        // 작성 게시글 최상단에 추가
        setUnshiftBoardList(state, data) {
            state.boardData.unshift(data);
        },

        // 유저 작성글 수 + 1
        setAddUserBoardsCount(state, data) {
            state.userInfo.boards_count++;
            localStorage.setItem('userInfo', state.userInfo);
        },
    },
    actions: {
        /**
         * 로그인 처리
         * 
         * @param {*} context 
         */
        login(context) {
            const url = 'api/login';
            const form = document.querySelector('#loginForm');
            const data = new FormData(form);
            axios.post(url, data)
            .then(response => {
                console.log(response.data); // TODO
                localStorage.setItem('userInfo', JSON.stringify(response.data.data));
                context.commit('setUserInfo', response.data.data);
                context.commit('setAuthFlg', true);

                router.replace('/board');
            })
            .catch(error => {
                console.log(error.response); // TODO
                // alert('로그인 실패 (' + error.response.data.code +')');
                alert(`로그인 실패 (${error.response.data.code})`);
                console.log('로그인 실패');
            })
        },

        /**
         * 로그아웃
         * 
         * @param {*} context
         */
        logout(context) {
            const url = '/api/logout';
            axios.post(url)
            .then(response => {
                console.log(response.data); // TODO
            })
            .catch(error => {
                console.log(error.response); // TODO
                alert(`문제 발생으로 강제 로그아웃 (${error.response.data.code})`);
            })
            .finally(() => {
                localStorage.clear(); 

                context.commit('setAuthFlg', false);
                context.commit('setUserInfo', null);

                router.replace('/login');
            });
        },

        /**
         * 최초 게시글 획득
         * 
         * @param {*} context 
         */
        getBoardData(context) {
            const url = '/api/board';

            axios.get(url)
            .then(response => {
                console.log(response.data); // TODO
                context.commit('setBoardData', response.data.data);
            })
            .catch(error => {
                console.log(error.response); // TODO
                alert(`게시글 획득 실패 (${error.response.data.code})`)
            })
        },

        /**
         * 추가 게시글 획득
         * @param {*} context 
         */
        setMoreBoardData(context) {
            const lastItem = context.state.boardData[context.state.boardData.length - 1];
            const url = '/api/board/' + lastItem.id;
            axios.get(url)
            .then(response => {
                console.log(response.data); // TODO
                context.commit('setMoreBoardData', response.data.data);

                // 더보기 버튼 플래그 갱신
                if(response.data.data) {
                    context.commit('setMoreBoardFlg', false);
                }
            })
            .catch(error => {
                console.log(error.response);
                alert(`추가 게시글 획득 실패 (${error.response.data.code})`)
            })
        },

        /**
         * 회원 가입
         * @param {*} context 
         */
        registration(context) {
            const url = '/api/registration';
            const data = new FormData(document.querySelector('#registrationForm'));

            // 서버에 요청
            axios.post(url, data)
            .then(response => {
                console.log(response.data); // TODO
                router.replace('/login');
            })
            .catch(error => {
                console.log(error.response.data);  // TODO
                alert(`회원 가입 실패 (${error.response.data.code})`)
            });
        },

        /**
         * 게시글 작성
         * @param {*} context 
         * @param {object} boardInfo 
         */
        storeBoard(context, boardInfo) {
            const url = '/api/board';

            // ajax 처리
            const data = new FormData(document.querySelector('#boardCreateForm'));

            // axios 처리
            axios.post(url, data)
            .then(response => {
                context.commit('setUnshiftBoardList', response.data.data);

                // 유저 작성 게시글수 증가
                localStorage.setItem('setAddUserBoardsCount', JSON.stringify(context.state.userInfo));
                router.replace('/board');
            })
            .catch(error => {
                console.log(error.response.data + '  : error + response'); // TODO
                alert(`게시글 작성 실패 (${error.response.data.code})`);
            })
        },

        /**
         * 게시글 삭제
         * @param {*} context
         */

        delete(context, boardId) {
            const url = '/api/board/' + boardId;

            axios.delete(url)
            .then(response => {
                console.log(response.data, '삭제 완료');
                // context.commit('closeModal');
                router.replace('/board');
            })
            .catch(error => {
                console.log(error.response.data, '삭제 실패');
            })
        }

    }
    
});

export default store;
