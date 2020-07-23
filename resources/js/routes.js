import VueRouter from "vue-router";

const  routes = [
    {
        path: '/',

    }
];


const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
});

export default router;

