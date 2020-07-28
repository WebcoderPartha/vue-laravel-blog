<template>
    <span>
           <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Blog left sidebar</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><router-link :to="{name: 'homepage'}"><i class="icon-home"></i></router-link><i class="icon-angle-right"></i></li>
              <li><router-link :to="{name: 'blogpost'}">Blog</router-link><i class="icon-angle-right"></i></li>
              <li class="active">Blog with left sidebar</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article v-for="(post, index) in showblogspost.data" :key="'post' + index">
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{post.title}}</a></h3>
                    </div>
                    <img :src="showphoto(post.photo)" />
                  </div>
                  <p>
                    {{ post.description | short(50, '')}}
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
                      <li><i class="icon-user"></i><a href="#"> {{post.user.name}}</a></li>
                      <li><i class="icon-folder-open"></i><a href="#"> {{post.category ? post.category.cat_name : 'Uncategories'}}</a></li>
                      <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                    </ul>
                    <router-link to="/" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                  </div>
                </div>
              </div>
            </article>
          </div>

            <!-- Right Sidebar Component -->
            <right-sidebar></right-sidebar>
            <!-- End Right Sidebar -->
        </div>
              <div class="row">
                  <div class="span8">
                     <el-pagination
                         background
                         @current-change="handleCurrentChange"
                         :current-page.sync="currentPage"
                         :page-size="showblogspost.per_page"
                         layout="prev, pager, next"
                         :total="showblogspost.total">
                     </el-pagination>
                  </div>
              </div>
      </div>

    </section>
    </span>
</template>

<script>
    import RightSidebar from "./RightSidebar";
    export default {
        name: "BlogPost",
        data(){
            return {
                currentPage : 1
            }
        },
        components : {
            'right-sidebar' : RightSidebar
        },
        mounted(){
            this.$store.dispatch('getShowAllBlog', this.currentPage)
        },
        computed:{
            showblogspost(){
                return this.$store.getters.getHomeBlog
            }
        },
        methods:{
            showphoto(img){
                return '/images/' + img
            },
            handleCurrentChange(){
                this.$store.dispatch('getShowAllBlog', this.currentPage)
            }
        }
    }
</script>

<style scoped>

</style>
