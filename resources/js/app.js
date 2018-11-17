require('./bootstrap');

window.Vue = require('vue');

Vue.component('app-card', require('./components/Card.vue'));

const app = new Vue({
    el: '#app'
});