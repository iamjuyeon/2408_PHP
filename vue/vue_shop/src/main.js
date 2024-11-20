import { createApp } from 'vue'
import App from './App.vue'
import store from './store/store.js' //vuex 저장소 import
createApp(App)
.use(store) //vuex 저장소 사용
.mount('#app')
