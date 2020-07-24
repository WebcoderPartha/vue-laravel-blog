import VueRouter from "vue-router";
import router from "./routes";
import AdminMaster from "./components/admin/AdminMaster";

require('./bootstrap');
require('admin-lte/dist/js/adminlte.min');
require('admin-lte/dist/js/demo');
require('admin-lte/plugins/datatables/jquery.dataTables.min');
require('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min');
require('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min');
require('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min');

window.Vue = require('vue');



// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-master', require('./components/admin/AdminMaster').default);
Vue.use(VueRouter);

import { Form, HasError, AlertError } from 'vform';
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
window.Form = Form;

const app = new Vue({
    el: '#app',
    router,
    components: {
        AdminMaster
    }
});
