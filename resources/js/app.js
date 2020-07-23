import VueRouter from "vue-router";
import router from "./routes";

require('./bootstrap');
require('admin-lte/dist/js/adminlte.min');
require('admin-lte/dist/js/demo');


window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.use(VueRouter);


const app = new Vue({
    el: '#app',
    router
});
