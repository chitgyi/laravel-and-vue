require('./bootstrap');
import Vue from 'vue'
import Vuetify from 'vuetify'
import App from './layouts/App'

Vue.use({
    install(Vue) {
        Vue.prototype.$api = axios.create()
    }
})

// register vuetify
Vue.use(Vuetify)

// initialize vue 
new Vue({
    components: { App },
    template: '<App/>'
}).$mount("#app");
