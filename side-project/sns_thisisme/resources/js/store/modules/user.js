import axios from "../../axios";
import router from "../../router";

export default {
    namespaced: true, 

    state: () => ({
        authFlg: localStorage.getItem('accessToken') ? true : false,
        userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : {}
    }),
    mutations: {
        setAuthFlg(state, flg) {
            state.authFlg = flg;
        },
        setUserInfo(state, userInfo) {
            state.userInfo = userInfo;
        },
        setUserInfoBoardsCount(state) {
            state.userInfo.boards_count++;
            localStorage.setItem('userInfo', JSON.stringify(state.userInfo));
        },
    },
    actions: {

        //***인증 관련***//
        login(context, userInfo) {
            const url = '/api/login';
            const data = JSON.stringify(userInfo);

            axios.post(url, data)
            .then(response => {
                console.log(response);

                localStorage.setItem('accessToken', response.data.accessToken);
                localStorage.setItem('refreshToken', response.data.refreshToken);
                localStorage.setItem('userInfo', JSON.stringify(response.data.data));

                context.commit('setAuthFlg', true);
                context.commit('setUserInfo', response.data.data);

                router.replace('/boards'); //로그인이 되면 boards로 이동
            })
            .catch(error => {
                let errorMsgList = [];
                const errorData = error.response.data;

                if(error.response.status === 422) {
                    //유효성 체크 에러
                    if(errorData.data.account) { //에러가 있으면 처리
                        errorMsgList.push(errorData.data.account[0]);
                    }

                    if(errorData.data.password) {
                        errorMsgList.push(errorData.data.password[0]);
                    } 

                } else if(error.response.status === 401) {
                    errorMsgList.push(errorData.msg);   
                } else {
                    errorMsgList.push('예기치 못한 오류 발생')
                }
                alert(errorMsgList.join('\n')); //join('\n') : '\n'포함시키기
            });
        }
    },

    getters: {

    }
}