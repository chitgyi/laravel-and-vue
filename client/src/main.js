
import Vue from 'vue';
import vuetify from './plugins/vuetify';
import App from './App'


new Vue({
    vuetify,
    components: { App },
    template: '<App/>'
}).$mount("#app");