export default {
    state       : {
        category: []
    },
    getters     :{
        getCategory(state){
            return state.category;
        }
    },
    actions     :{
        allCategory(context){
            axios.get('/api/category')
                .then(response=>{
                   context.commit('allCategories', response.data.categories);
                })
        }
    },
    mutations   : {
        allCategories(state, data){
            return state.category = data
        }
    }
}
