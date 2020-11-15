import Vue from 'vue'
import App from './../assets/layouts/App'
import router from './routes'


const app = new Vue({
    el: '#app',
    components: {App},
    template: '<App/>',
    router
});