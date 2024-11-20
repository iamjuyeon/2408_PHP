import { createStore } from 'vuex'
import board from './modules/board.js';
import detailBoard from './modules/detailBoard.js';




export default createStore({ //createStore가 객체를 생성하고 객체가 store로 이동
    modules: {
        //board.js 불러오기
        board,
        detailBoard,
    },
})



