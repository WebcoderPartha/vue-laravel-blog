<template>
    <div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 m-auto">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" @submit.prevent="UpdateCategory">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="cat_name">Edit Category Name</label>
                                        <input type="text"
                                               class="form-control"
                                               id="cat_name"
                                               placeholder="Enter category name"
                                               v-model="form.cat_name"
                                               name="cat_name"
                                               :class="{ 'is-invalid': form.errors.has('cat_name') }"
                                        >
                                        <has-error :form="form" field="cat_name"></has-error>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button :disabled="form.busy" type="submit" class="btn btn-primary">Update Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Edit",
        data(){
            return {
                form : new Form({
                    cat_name : ''
                })
            }
        },
        mounted() {
          axios.get(`/api/edit-category/${this.$route.params.categoryid}`)
              .then(response => {
                  this.form.fill(response.data.category)
              })
        },
        methods: {
            UpdateCategory(){
                this.form.put(`/api/update-category/${this.$route.params.categoryid}`)
                    .then(response => {
                        console.log(response.data);
                        this.$router.push('/category-list');
                        Toast.fire({
                            icon: 'success',
                            title: this.form.cat_name +' category has been updated'
                        });
                    }).catch(() => {

                });
            }
        }
    }
</script>

<style scoped>

</style>
