require('./bootstrap');
import { createApp } from 'vue';
import AppComponent from '../views/components/AppComponent.vue';
import store from './store/store.js';
import router from './router';

createApp({
    components: {
        AppComponent,
    }
})
.use(store)
.use(router)
.mount('#app');