require('./bootstrap');
window.Vue = require('vue').default;

Vue.component('vue-component', require('./components/VueComponent.vue').default);

const app = new Vue({
    el: '#app',
});
