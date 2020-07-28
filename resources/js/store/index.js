export default {
    state       : {
        category    : [],
        post        : [],
        homeblog    : [],
        lc_category : []
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
        getlocalCategory(state){
            return state.lc_category
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
        }
    }
}
