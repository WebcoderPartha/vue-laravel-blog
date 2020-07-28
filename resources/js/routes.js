import VueRouter from "vue-router";
import NotFoundPage from "./components/404";
import AdminHome from "./components/admin/AdminHome";
import CategoryList from "./components/admin/category/List";
import AddCategory from "./components/admin/category/New";
import EditCategory from "./components/admin/category/Edit";
import PostList from "./components/admin/posts/PostList";
import EditPost from "./components/admin/posts/EditPost";
import CreatePost from "./components/admin/posts/Create";

// Frontend Component Import
import HomePage from "./components/public/PublicHome";
import SinglePost from "./components/public/blog/SinglePost";
import BlogPost from "./components/public/blog/BlogPost";

const  routes = [
    {
        path        : '/home',
        component   : AdminHome
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
    // Post
    {
        path        : '/posts/all',
        component   : PostList,
        name        : 'posts'
    },
    {
        path        : '/posts/add-new-post',
        component   : CreatePost,
        name        : 'postcrete'
    },
    {
        path        : '/post/edit/:postId',
        component   : EditPost,
        name        : 'edit_post'
    },
    // 404 Page
    {
        path        : '*',
        component   : NotFoundPage,
    },

    // ***********************!|||| Frontend Routing ||||!*************************
    {
        path        : '/',
        component   : HomePage,
        name        : 'homepage'
    },
    {
        path        : '/blog',
        component   : BlogPost,
        name        : 'blogpost'
    }
];

const router = new VueRouter({
    routes, // short for `routes: routes`c
    mode: 'history'
});

export default router;

