export default {
    state       : {
        category            : [],
        post                : [],
        homeblog            : [],
        singlepost          : [],
        lc_category         : [],
        sidebar_category    : [],
        sidebar_post        : [],
        categorypost        : []
    },
    getters     :{
        getCategory(state){
            return state.category
        },
        getPost(state){
            return state.post
        },
        getHomeBlog(state){
            return state.homeblog
        },
        getSinglesPost(state){
          return state.singlepost
        },
        getlocalCategory(state){
            return state.lc_category
        },
        // ES6 Format
        getSidebarCategory : state => {
            return state.sidebar_category
        },
        getSidebarPost : state => {
            return state.sidebar_post
        },
        getCategorybypost : state => {
            return state.categorypost
        }
    },
    actions     : {
        allCategory(context, payload){
            axios.get('/api/category?page='+payload)
                .then((response)=>{
                   context.commit('allCategories', response.data.categories);
                })
        },
        LocalAllCategory(context){
            axios.get('/api/local-category')
                .then((response) => {
                    context.commit('lcs_allctegory', response.data.categorieses)
                })
        },
        getAllPost(context, payload){
            axios.get('/api/getposts?page='+payload)
                .then((response) => {
                    context.commit('allPost', response.data.posts)
                })
        },
        getShowAllBlog(context, payload){
            axios.get('/api/showblogpost?page='+payload)
                .then((response) => {

                    context.commit('homblogs', response.data.posts)
                })
        },
        getSinglePost(context,payload){
            axios.get('/api/showpost/'+payload)
                .then((response) => {
                context.commit('showsinglespost', response.data.post)
            })
        },
        getSidebarCategory : context =>{
            axios.get('/api/getcategory')
                .then((response) => {
                context.commit('getsidebar', response.data.categories)
            })
        },
        getSidebarPosts : context => {
            axios.get('/api/getsidebarpost')
                .then((response) => {
                    context.commit('getsidebarposts', response.data.posts)
                })
        },
        getCategoryidByPost(context, payload){
            axios.get('/api/categories/'+payload)
                .then((response) => {
                    context.commit('CategoryidByPost', response.data.category_post)
                })
        },
        SearchPost(context, payload){
            axios.get('/api/search?s='+payload)
                .then((response) => {
                    context.commit('getSearchPost', response.data.posts)
                })
        }
    },
    mutations   : {
        allCategories(state, data){
            return state.category = data
        },
        lcs_allctegory(state,data){
            return state.lc_category = data
        },
        allPost(state, data){
            return state.post = data
        },
        homblogs(state, data){
            return state.homeblog = data
        },
        showsinglespost(state, data){
            return state.singlepost = data
        },
        getsidebar(state, data){
            return state.sidebar_category = data
        },
        getsidebarposts(state, data){
            return state.sidebar_post = data
        },
        CategoryidByPost(state, data){
            return state.categorypost = data
        },
        getSearchPost(state, data){
            return state.homeblog = data
        }
    }
}
