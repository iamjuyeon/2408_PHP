require('./bootstrap');
import { createApp } from 'vue'; //뷰에 있는 createApp
import AppComponent from '../views/components/AppComponent.vue'; // appcomponent 불러오기
import router from './router';

createApp({
    components: {
        AppComponent,
    }
})
.use(router)//라라벨과 뷰의 라우트는 다르다
.mount('#app'); // id=app 인 곳에 올리겠다 

