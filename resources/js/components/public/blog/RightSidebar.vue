<template>
   <span class="sidebar">
        <div class="span4">
        <aside class="right-sidebar">
            <div class="widget">
                <form class="form-search">
                    <input placeholder="Type something" @keyup="RealSearch" type="text" v-model="keyword" class="input-medium search-query">
                    <button type="submit" @click.prevent="RealSearch" class="btn btn-square btn-theme">Search</button>
                </form>
            </div>
            <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                    <li
                        v-for="(category, index) in getcategories"
                    >
                        <i class="icon-angle-right"></i>
                        <router-link :to="`/blog/category/${category.id}`">{{category.cat_name}}</router-link>
                        <span> ({{category.posts_count}})</span>
                    </li>
                </ul>
            </div>
            <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                    <li v-for="(post, index) in getposts" v-if="index < 5">
                        <img :src="postimg(post.photo)" class="pull-left" alt="" width="40px" height="40px" />
                        <h6><router-link :to="`/blog/${post.id}`">{{post.title}}</router-link></h6>
                        <p>{{post.description}}</p>
                    </li>
                </ul>
            </div>
            <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                    <li><a href="#">Web design</a></li>
                    <li><a href="#">Trends</a></li>
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">Internet</a></li>
                    <li><a href="#">Tutorial</a></li>
                    <li><a href="#">Development</a></li>
                </ul>
            </div>
        </aside>
    </div>
   </span>
</template>

<script>
    import _ from 'lodash';
    export default {
        data(){
            return {
                keyword : ''
            }
        },
        mounted() {
            this.$store.dispatch('getSidebarCategory')
            this.$store.dispatch('getSidebarPosts')
        },
        computed:{
            getcategories(){
                return this.$store.getters.getSidebarCategory
            },
            getposts(){
                return this.$store.getters.getSidebarPost
            }
        },
        methods:{
            postimg(img){
                return '/images/'+img
            },
            RealSearch:_.debounce(function (){
                this.$store.dispatch('SearchPost', this.keyword)
            }, 1000)
        }
    }
</script>

<style scoped>

</style>
