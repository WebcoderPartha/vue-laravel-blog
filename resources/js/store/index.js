export default {
    state       : {
        category: [],
        post    : []
    },
    getters     :{
        getCategory(state){
            return state.category;
        },
        getPost(state){
            return state.post
        }
    },
    actions     :{
        allCategory(context){
            axios.get('/api/category')
                .then(response=>{
                   context.commit('allCategories', response.data.categories);
                })
        },
        getAllPost(context){
            axios.get('/api/getposts')
                .then(response => {
                    console.log(response.data.posts)
                    context.commit('allPost', response.data.posts)
                })
        }
    },
    mutations   : {
        allCategories(state, data){
            return state.category = data
        },
        allPost(state, data){
            return state.post = data
        }
    }
}
