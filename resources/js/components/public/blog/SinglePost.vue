<template>
    <span class="single-post">
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Post right sidebar</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
              <li class="active">Blog post right sidebar</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{singlePost.title}}</a></h3>
                    </div>
                    <img :src="postImg(singlePost.photo)" />
                  </div>
                  <p>{{singlePost.description}}</p>

                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-user"></i><a href="#">{{singlePost.user.name}}</a></li>
                      <li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
                      <li><i class="icon-tags"></i><a href="#">{{singlePost.category.cat_name}}</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </article>
          </div>
          <right-sidebar></right-sidebar>
        </div>
      </div>
    </section>
    </span>
</template>

<script>
    import RightSidebar from "./RightSidebar";
    export default {
        name: "SinglePost",
        components: {
            RightSidebar
        },
        mounted(){
            this.$store.dispatch('getSinglePost', this.$route.params.postId)
        },
        computed:{
            singlePost(){
               return this.$store.getters.getSinglesPost
            }
        },
        methods:{
            postImg(img){
                return '/images/'+img
            }
        },
        watch:{
            $route(){
                this.$store.dispatch('getSinglePost', this.$route.params.postId)
            }
        }
    }
</script>

<style scoped>

</style>
