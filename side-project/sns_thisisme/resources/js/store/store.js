import { createStore } from 'vuex'
import board from './modules/board';
import user from './modules/user';


export default createStore({
    modules: {
        user,
        board,
    },
})