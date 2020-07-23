import VueRouter from "vue-router";
import NotFoundPage from "./components/404";
import AdminHome from "./components/admin/AdminHome";
import ExampleComponent from "./components/ExampleComponent";
import CategoryList from "./components/admin/category/List";


const  routes = [
    {
        path        : '/home',
        component   : AdminHome
    },
    {
        path        : '/post',
        component   : ExampleComponent,
        name        : 'posts'
    },
    {
        path        :  '/category-list',
        component   : CategoryList,
        name        : 'category_list'

    },
    {
        path        : '*',
        component   : NotFoundPage,
    }
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
});

export default router;

