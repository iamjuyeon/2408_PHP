import axios from "../../axios";
import router from "../../router";

export default {
    namespaced: true,
    state: () => ({
        // accessToken: localStorage.getItem('accessToken') ? localStorage.getItem('accessToken') : '',
        authFlg: localStorage.getItem('accessToken') ? true : false,
        userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : {} //JSON.parse 자바 객체 형태로 변경
    }),
    mutations: {
        // setAccessToken(state, accessToken) {
        //     state.accessToken = accessToken;
        //     //*****문제점 보안*****

        //     localStrorage.setItme('accessToken', accessToken);
        // }
        setAuthFlg(state, flg) {
            state.authFlg = flg;
        },
        setUserInfo(state, userInfo) {
            state.userInfo = userInfo;
        }
    },
    actions: {
        // +++++++++++++++++++++
        // ----인증 관련 ------
        // +++++++++++++++++++++
        // ******로그인 처리 *********
        //@param {*} context
        //$param {*} userInfo
        login(context, userInfo) { //첫번째 파라미터  = contrext 무조건 고정 //userInfo 전달해줄 값
            const url = '/api/login';
            //json 형태로 serializing
            const data = JSON.stringify(userInfo);
            // const config = {
            //     headers: {
            //         'Content-type' : 'application/json'
            //     }
            // }
            
            axios.post(url, data)
            .then(response => {
                // console.log(response);
                //토큰 저장(해당 뮤테이션 불러오기)
                //context 액션메소드로 이동
                // context.commit('setAccessToken', response.data.accessToken);
                //문제점 : refresh하면 사라짐. 저장이 안됨

                localStorage.setItem('accessToken', response.data.accessToken);
                localStorage.setItem('refreshToken', response.data.refreshToken);
                localStorage.setItem('userInfo', JSON.stringify(response.data.data));

                context.commit('setAuthFlg', true);
                context.commit('setUserInfo', response.data.data);

                //보드 리스트로 이동
                router.replace('/boards');

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
                
            },
            // +=============+
            // +로그아웃 처리 +
            // +=============+
            //@param {*} context
            logout(context) {
                const url = '/api/logout';
                const config = {
                    headers: {
                        'Authorization' : 'Bearer ' + localStorage.getItem('accessToken'),
                    }
                }


                axios.post(url, null, config)
                .then(response => { 
                    alert('로그아웃 완료');
                })
                .catch(error => {
                    alert('문제가 발생하여 로그아웃 처리');
                })
                .finally(() => {
                    localStorage.clear(); //싹 비워짐

                    // state 초기화
                    context.commit('setAuthFlg', false);
                    context.commit('setUserInfo', {});
    
                    router.replace('/login');//굳이 이력 남길 필요 없음 
                });


            },
            
        },
    
    getters: {

    }
}
