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
        },
        setUserInfoBoardsCount(state) {
            state.userInfo.boards_count++;
            localStorage.setItem('userInfo', JSON.stringify(state.userInfo));
        },

    },
    actions: {
        // +===================+
        // +    인증 관련       +
        // +===================+
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

                //로그인 성공하면 alert 
                alert('🎊로그인 성공🎊 "\n" 환영합니다');
                
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
            // +==================+
            // +   로그아웃 처리   +
            // +==================+
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
                    alert('게시글을 다시 보고 싶다면 로그인 해주세요');
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

        // +==================+
        // +   회원 가입 처리  +
        // +==================+
        //@param {*} context
        //@param {*} userInfo
        registration(context, userInfo) {
            const url = '/api/registration';
            const config = {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };

        //form-data 세팅
        const formData = new FormData();
        formData.append('account', userInfo.account);
        formData.append('password', userInfo.password);
        formData.append('password_chk', userInfo.password_chk);
        formData.append('name', userInfo.name);
        formData.append('gender', userInfo.gender);
        formData.append('profile', userInfo.profile);
        
        axios.post(url, formData, config)
        .then(response => {
            alert('회원가입 성공 \n 가입하신 계정으로 로그인 해주세요');
            router.replace('/login');
        })
        .catch(error => {
            alert('회원가입 실패 ㅠㅠ');
        });
        },
        
        // +============================+
        // + 토큰 만료 체크 후 처리 속행  +
        // +============================+
        //@param {*} context
        //@param {Function} callbackProcess
        chkTokenAndContinueProcess(context, callbackProcess) {
            //payload 획득 (토큰이 만료됐는지 확인)
            const payload = localStorage.getItem('accessToken').split('.')[1];//payload 1번방
            const base64 = payload.replace(/-/g, '+').replace(/_/g, '/'); //base64 URL 디코딩
            //g: global 
            const objPayload = JSON.parse(window.atob(base64)); //base64로 ㄷ디코딩
            const now = new Date();
            
            //프론트에서 토큰 유효 체크 하는 과정
            if((objPayload.exp * 1000) > now.getTime()) {
                // 토큰 유효
                console.log('토큰 유효');
                callbackProcess();
            } else {
                //토큰 만료 -> 토큰 새로 발급처리
                console.log('토큰 만료');
                context.dispatch('reissueAccessToken', callbackProcess);
                
            }
        },
        // *********************
        // ***토큰 재발급 처리***
        // *********************
        //@param {*} context
        //@param {callback} callbackProcess
        reissueAccessToken(context, callbackProcess) {
            console.log('토큰 재발급 처리');
            const url = '/api/reissue';
            const config = {
                headers: {
                    'Authorization' : 'Bearer ' + localStorage.getItem('refreshToken')
                }
            };
            axios.post(url, null, config)
            .then(response => {
                //토큰 셋팅
                localStorage.setItem('accessToken', response.data.accessToken);
                localStorage.setItem('refreshToken', response.data.refreshToken);


                //후속 처리 진행
                callbackProcess();
            })
            .catch(error => {
                console.log(error);
            })
        }
        },
    
    getters: {

    }
}
