require('./bootstrap');

import Toaster from 'v-toaster'
window.Vue = require('vue');

Vue.use(Toaster, {timeout: 5000});

Vue.component('message', require('./components/Message.vue').default);

const app = new Vue({
    el: '#app',
});

