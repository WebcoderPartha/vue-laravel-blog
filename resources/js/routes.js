import VueRouter from "vue-router";
import NotFoundPage from "./components/404";
import AdminHome from "./components/admin/AdminHome";
import ExampleComponent from "./components/ExampleComponent";
import CategoryList from "./components/admin/category/List";
import AddCategory from "./components/admin/category/New";
import EditCategory from "./components/admin/category/Edit";


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
        path        :  '/add-category',
        component   : AddCategory,
        name        : 'add_category'
    },
    {
        path        :  '/edit-category/:categoryid',
        component   : EditCategory,
        name        : 'edit_category'
    },
    {
        path        : '*',
        component   : NotFoundPage,
    }
];

const router = new VueRouter({
    routes, // short for `routes: routes`c
    mode: 'history'
});

export default router;

