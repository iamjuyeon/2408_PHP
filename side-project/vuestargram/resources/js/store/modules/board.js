import axios from "../../axios";
import router from "../../router";


export default ({
    namespaced: true,
    state: () => ({
        boardList: [],
        page: 0, 

        //상세 모달에다가 저장
        boardDetail: null,

        controllFlg: true,

        //마지막 페이지인지 확인
        lastPageFlg: false,
    }),
    mutations: {
        setBoardList(state, boardList) {
            state.boardList = state.boardList.concat(boardList);
        },
        setPage(state, page) {
            state.page = page;
        },

        setBoardDetail(state, board) {
            state.boardDetail = board;
        },

        setBoardListUnshift(state, board) {
            state.boardList.unshift(board);
        },
        setControllFlg(state, flg) {
            state.controllFlg = flg;
        },

        setLastPageFlg(state, flg) {
            state.lastPageFlg = flg;
        },

        
    },
    actions: {
        
        //************************** */
        //*******게시글 획득 *********/
        //************************** */
        //@param {*} context

        //로그인 한 유저만 사용가능
        
        boardListPagenation(context) {
            context.dispatch('user/chkTokenAndContinueProcess'
                , () => {
                    //디바운싱 처리 시작
                    if(context.state.controllFlg && !context.state.lastPageFlg) {
                        context.commit('setControllFlg', false); 
        
                        const url = '/api/boards?page=' + context.getters['getNextPage']; 
                        const config = {
                            headers: {
                                'Authorization' : 'Bearer ' + localStorage.getItem('accessToken'),
                            }
                        }
                        axios.get(url, config)
                        .then(response => {
                            // console.log(response);
                            context.commit('setBoardList', response.data.boardList.data);    
                            context.commit('setPage', response.data.boardList.current_page);
        
                            //마지막 페이지인지 확인하는 과정, 마지막 페이지면 더이상 서버로 요청을 보내지 않음
                            if(response.data.boardList.current_page >= response.data.boardList.last_page) {
                                context.commit('setLastPageFlg', true); 
                            }
                        })
                        .catch(error => {
                            console.log(error);
                        })
                        .finally(()=> {
                            context.commit('setControllFlg', true);
                        });
                    }

                }
                , {root:true})

        },
        // *******************************
        // ******게시글 상세 정보 획득*****
        // *******************************
        // @param {*} context
        // @param {int} id
        showBoard(context, id) {
            //refresh token 재발행하는 처리
            context.dispatch('user/chkTokenAndContinueProcess'
                , () => {
                    const url = '/api/boards/' + id;
                    const config = {
                        headers: {
                            'Authorization' : 'Bearer ' + localStorage.getItem('accessToken'),
                        }
                    }
                    axios.get(url, config)
                    .then(response => {
                        console.log(response); 
                        context.commit('board/setBoardDetail', response.data.board, {root:true});
                    })
                    .catch(error => {
                        console.log(error);
                    });
                }
                , {root:true});

        },
        
        // *******************************
        // *********게시글 작성 ***********
        // *******************************
        storeBoard(context, data) {
            context.dispatch('user/chkTokenAndContinueProcess'
                , () => {
                    if(context.state.controllFlg) {
                        context.commit('setControllFlg', false) 
                        const url = '/api/boards';
                        const config = {
                            headers: {
                                //로그인 한 유저만 글을 작성할 수 있기때문에 계속 access token확인
                                'Content-Type': 'multipart/form-data',
                                'Authorization' : 'Bearer ' + localStorage.getItem('accessToken'),
                            }
                        };
                        const formData = new FormData();
                        formData.append('content', data.content);
                        formData.append('file', data.file);
            
                        axios.post(url, formData, config)
                        .then(response => {
                            context.commit('setBoardListUnshift', response.data.board);
                            //다른 모듈 접근
                            context.commit('user/setUserInfoBoardsCount', null, {root:true});
            
                            router.replace('/boards');
                        })
                        .catch(error => {
                            console.log(error);
                        })
                        .finally(() => {
                            context.commit('setControllFlg', true);
                        })
                    }

                }
                , {root:true});
        },

    },

    getters: {
        getNextPage(state) {
            return state.page + 1;
        },
    }
});