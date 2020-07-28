<template>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Post</h3>
                            <div class="card-tools">
                                <router-link class="btn btn-primary" :to="{name: 'postcrete'}">Add Post</router-link>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>SL</th>
                                                    <th>Author</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Category</th>
                                                    <th>Image</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row" class="odd" v-for="(post, index) in posts.data" :key="'post' + index">
                                                    <td>{{ index+1 }}</td>
                                                    <td>{{ post.user ? post.user.name : 'No Name' }}</td>
                                                    <td>{{ post.title | short(15, '') }}</td>
                                                    <td>{{ post.description | short(30, ' ..') }}</td>
                                                    <td>{{ post.category ? post.category.cat_name : 'Uncategoried' }}</td>
                                                    <td><img :src="post.photo ? postPhoto(post.photo) : 'http://via.placeholder.com/40x50' " height="100" width="70" alt=""></td>
                                                    <td>{{ post.created_at | timeFormat }}</td>
                                                    <td>{{ post.updated_at | timeFormat }}</td>
                                                    <td class="action"><router-link :to="`/post/edit/${post.id}`" class="btn btn-success"><i class="fa fa-edit"></i></router-link> | <button @click.prevent="postDelete(post.id)" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr role="row">
                                                    <th>SL</th>
                                                    <th>Author</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Category</th>
                                                    <th>Image</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="d-flex mt-3">
                                            <div class="mx-auto">
                                                <el-pagination
                                                    background
                                                    @current-change="handleCurrentPageChange"
                                                    :current-page.sync="currentPage"
                                                    :page-size="posts.per_page"
                                                    layout="prev, pager, next"
                                                    :total="posts.total">
                                                </el-pagination>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PostList",
        data(){
          return {
              currentPage : 1
          }
        },
        mounted() {
            this.$store.dispatch('getAllPost', this.currentPage)
        },
        computed: {
            posts(){
                return this.$store.getters.getPost
            }
        },
        methods: {
            // src path src="postPhoto(post.photo)"
            postPhoto(img){
                return '/images/' + img;
            },
            postDelete(id){
                axios.delete('/api/post/'+id+'/delete')
                    .then(() => {
                        this.$store.dispatch('getAllPost')
                        Toast.fire({
                            icon: 'success',
                            title: 'Catetory has been deleted successfully'
                        });
                    }).catch(() => {

                })
            },
            handleCurrentPageChange(){
                this.$store.dispatch('getAllPost', this.currentPage)
            }
        }
    }
</script>

<style scoped>
    a.btn.btn-success  {
        padding: 2px 2px !important;
        background:none !important;
        border: none ;
        color: lightblue !important;
    }
    button.btn.btn-danger {
        padding: 2px 2px !important;
        background:none !important;
        border: none ;
        color: red !important;
    }
    .action {
        padding: 0;
    }
</style>
