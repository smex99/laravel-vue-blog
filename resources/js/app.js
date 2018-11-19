require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify';

Vue.use(Vuetify);

Vue.component('app-card', require('./components/Card.vue'));

const app = new Vue({
    el: '#app'
});