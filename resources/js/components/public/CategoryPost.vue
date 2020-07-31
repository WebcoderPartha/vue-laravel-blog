<template>
       <span>
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <div class="inner-heading">
                            <h2>Category Post</h2>
                        </div>
                    </div>
                    <div class="span8">
                        <ul class="breadcrumb">
                              <li><router-link :to="{name: 'homepage'}"><i class="icon-home"></i></router-link><i class="icon-angle-right"></i></li>
                              <li><router-link :to="{name: 'blogpost'}">Blog</router-link><i class="icon-angle-right"></i></li>
                              <li class="active">Category</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <article v-for="(post, index) in getCategoryPost" :key="'post' + index">
                            <div class="row">
                                <div class="span8">
                                    <div class="post-image">
                                        <div class="post-heading">
                                            <h3><router-link :to="`/blog/${post.id}`">{{post.title}}</router-link></h3>
                                        </div>
                                        <img :src="`/images/${post.photo}`" />
                                    </div>
                                    <p>{{post.desciption}}</p>
                                    <div class="bottom-article">
                                        <ul class="meta-post">
                                            <li><i class="icon-calendar"></i><a href="#"> {{ post.updated_at | timeFormat }}</a></li>
                                            <li><i class="icon-user"></i><a href="#"> {{post.user.name}}</a></li>
                                            <li><i class="icon-folder-open"></i><a href="#"> {{post.category.cat_name}}</a></li>
                                        </ul>
                                        <router-link :to="`/blog/${post.id}`" class="pull-right">Continue reng <i class="icon-angle-right"></i></router-link>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Right Sidebar Component -->
                    <right-sidebar></right-sidebar>
                    <!-- End Right Sidebar -->
                </div>
            </div>
        </section>
    </span>
</template>

<script>
import RightSidebar from "./blog/RightSidebar";
export default {
name: "CategoryPost",
    components: {
        RightSidebar
    },
    data(){
        return{
            currentPage: 1
        }
    },
    mounted() {
        this.singleCategoryPost()
    },
    computed: {
        getCategoryPost(){
            return this.$store.getters.getCategorybypost
        }
    },
    methods:{
        singleCategoryPost(){
            this.$store.dispatch('getCategoryidByPost', this.$route.params.id)
        }
    },
    watch: {
        $route(to, from){
            this.singleCategoryPost()
        }
    }
}
</script>

<style scoped>

</style>
