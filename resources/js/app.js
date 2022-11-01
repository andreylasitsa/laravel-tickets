require('./bootstrap');
window.Vue = require('vue').default;

if (document.getElementById('form')) {
    Vue.component('form-component', require('./components/FormComponent.vue').default);
    const form = new Vue({
        el: '#form-component',
    });
}

if (document.getElementById('list')) {
    Vue.component('list-component', require('./components/ListComponent.vue').default);
    const list = new Vue({
        el: '#list-component',
    });
}
