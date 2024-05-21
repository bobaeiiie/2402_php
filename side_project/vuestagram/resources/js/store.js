import { createStore } from 'vuex';
import axios from './axios';
import router from './router';

const store = createStore({
    state() {
        return {
            authFlg: localStorage.getItem('accessToken') ? true : false,
            userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : {},
        }
    },
    mutations: {
        // ----------
        // 인증관련
        // ----------
        setAuthFlg(state, boo) {
            state.authFlg = boo;
        },
        setUserInfo(state, userInfo) {
            state.userInfo = userInfo;
        }
    },
    actions: {
        // ----------
        // 인증관련
        // ----------
        /**
         * 
         * @param {*} context 
         * @param {*} userInfo 
         */
        login(context, userInfo) {
            console.log(JSON.stringify(userInfo));
            const url = '/api/login';
            axios.post(url, JSON.stringify(userInfo))
            .then(response => {
                // console.log(response.data);
                localStorage.setItem('accessToken', response.data.accessToken);
                localStorage.setItem('refreshToken', response.data.refreshToken);
                localStorage.setItem('userInfo', JSON.stringify(response.data.data));

                // state 갱신
                context.commit('setAttribute', true);
                context.commit('setUserInfo', response.data.data);
                router.replace('/board');

            })
            .catch(error => {
                console.log(error.response);
                const errorCode = error.response.data.msg ? error.response.data.msg : 'FE99';
                console.log(errorCode);
                alert('로그인 실패 : '+ errorCode);
            })
        }
    }
});

export default store;