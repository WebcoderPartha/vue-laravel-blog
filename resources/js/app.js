require('./bootstrap');
require('admin-lte/dist/js/adminlte.min');
require('admin-lte/dist/js/demo');
require('admin-lte/plugins/datatables/jquery.dataTables.min');
require('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min');
require('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min');
require('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min');

import VueRouter from "vue-router";
import Vuex from 'vuex'
import router from "./routes";
import AdminMaster from "./components/admin/AdminMaster";

//Sweet Alert 2
import Swal from 'sweetalert2';
window.Swal = Swal;
// Sweet Alert Message
const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 4000,
    timerProgressBar: false,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.Toast = Toast

window.Vue = require('vue');
Vue.component('admin-master', require('./components/admin/AdminMaster').default);
Vue.component('HomeMain', require('./components/public/PublicMaster').default);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.use(VueRouter);
Vue.use(Vuex)

// Support for vFrom for validation
import { Form, HasError, AlertError } from 'vform';
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
window.Form = Form;

// Support Vuex for Data fetch from database
import storeData from './store/index'
const store = new Vuex.Store(
    storeData
);



// CKEditor Support
import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.use( CKEditor );


import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI);

// Support Moment JS Time Format
import filter from './filter';

const app = new Vue({
    el: '#app',
    router,
    components: {
        AdminMaster
    },
    store
});
