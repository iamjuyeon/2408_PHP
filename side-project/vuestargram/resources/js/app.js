require('./bootstrap');
import { createApp } from 'vue'; //뷰에 있는 createApp
import AppComponent from '../views/components/AppComponent.vue'; // appcomponent 불러오기
import router from './router';
import store from './store/store';

createApp({
    components: {
        AppComponent,
    }
})
.use(store)
.use(router)//라라벨과 뷰의 라우트는 다르다
.mount('#app'); // id=app 인 곳에 올리겠다 
//mount 밑에 아무것도 쓸수없다
