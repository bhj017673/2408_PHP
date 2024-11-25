import axios from "axios";
import router from '../../router';

export default {
    namespaced: true, 
    state: () => ({
        // accessToken: localStorage.getItem('accessToken') ? localStorage.getItem('accessToken') : '',
        authFlg: localStorage.getItem('accessToken') ? true : false,
        userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : {},
    }),
    mutations: {
        // setAccessToken(state,accessToken){
        //     state.accessToken = accessToken;
        //     localStorage.setItem('accessToken', accessToken);
        // },
        setAuthFlg(state, flg) {
            state.authFlg = flg;
        },
        setUserInfo(state, userInfo) {
            state.userInfo = userInfo;
        },
    },
    actions: {
        //---------
        //인증관련
        // --------
        /**
         * 로그인 처리
         * 
         * @param {*} context
         * 첫번째는 context 고정, 두번째는 전달해줄값 주로 객체
         * @param {*} userInfo
         */
        login(context, userInfo) {
            const url = '/api/login';
            const data = JSON.stringify(userInfo);
            const config = {
                headers: {
                    'Content-Type' : 'application/json'
                }
            }
            
            axios.post(url, data, config)
            .then(response => {
                // console.log(response);
                // 토큰저장
                // context.commit('setAccessToken', response.data.accessToken);
                localStorage.setItem('accessToken', response.data.accessToken);
                localStorage.setItem('refreshToken', response.data.refreshToken);
                localStorage.setItem('userInfo', JSON.stringify(response.data.data));
                context.commit('setAuthFlg', true);
                context.commit('setUserInfo', response.data.data);

                // 보드리스트로 이동
                router.replace('/board');
            })
            .catch(error => {
                let errorMsgList = [];
                const errorData = error.response.data;
                // console.log(error.response);
                if(error.response.status === 422) {
                    // 유효성체크 에러
                    if(errorData.data.account) {
                        errorMsgList.push(errorData.data.account[0]);
                    }
                    if(errorData.data.password) {
                        errorMsgList.push(errorData.data.password[0]);
                    }
                }else if (error.response.status === 401) {
                    // 비밀번호 오류
                    errorMsgList.push(errorData.msg);
                }else {
                    errorMsgList.push('예기치 못한 오류 발생');ㅍ
                }
                alert(errorMsgList.join('\n'));
            });
        },
        /**
         * 로그아웃 처리
         * 
         * @param {*}context
         */
        logout(context) {
            // TODO : 백엔드 처리 추가

            localStorage.clear();

            // state 초기화
            context.commit('setAuthFlg', false);
            context.commit('setUserInfo', {});
            router.replace('/login');
        
        },
    },
    getters: {

    }
}