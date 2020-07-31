<template>
    <div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                                <div class="card-tools">
                                    <button class="btn btn-primary"><router-link to="/add-category">Add Category</router-link></button >
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(category,index) in getAllCategory.data" :key="'category' + index">
                                        <td>{{ index+1 }}</td>
                                        <td>{{ category.cat_name }}</td>
                                        <td>{{ category.created_at | timeFormat }}</td>
                                        <td>{{ category.updated_at | timeFormat }}</td>
                                        <td>
                                            <router-link :to="`/edit-category/${category.id}`" class="btn btn-success"><i class="fa fa-edit"></i></router-link>
                                            <button @click.prevent="deleteCategory(category.id)" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
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
                                           @current-change="handleCurrentChangePage"
                                           :current-page.sync="currentPage"
                                           :page-size="getAllCategory.per_page"
                                           layout="prev, pager, next"
                                           :total="getAllCategory.total">
                                       </el-pagination>
                                   </div>
                               </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "List",
        data(){
            return {
                currentPage : 1,
                keyword : ''
            }
        },
        mounted() {
            this.$store.dispatch('allCategory', this.currentPage);
        },
        computed:{
            getAllCategory(){
                // return this.$store.getters.getCategory
                return this.$store.getters.getCategory
            }
        },
        methods:{
            handleCurrentChangePage(){
                this.$store.dispatch('allCategory', this.currentPage);
            },
            deleteCategory(id){
                axios.delete('/api/category/delete/'+id)
                    .then((response) => {
                        this.$store.dispatch('allCategory');
                        Toast.fire({
                            icon: 'success',
                            title: response.data.category.cat_name + ' catetory deleted successfully'
                        });
                })
            }
        }
    }
</script>

<style scoped>
    .card-tools .btn a {
        color:#fff;
    }
    .card-tools .btn a:hover{
        text-decoration: none
    }
</style>
