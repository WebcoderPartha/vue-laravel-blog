<template>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 m-auto">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" @submit.prevent="AddCategory">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="cat_name">Category Name</label>
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
                                    <button :disabled="form.busy" type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        name: "New",
        data(){
            return {
                form : new Form({
                    cat_name : ''
                })
            }
        },
        methods: {
            AddCategory(){
                this.form.post('/add-category')
                .then(response => {
                    console.log(response.data);
                    this.$router.push('/category-list');
                    Toast.fire({
                        icon: 'success',
                        title: 'Catetory added successfully'
                    });
                }).catch(() => {

                });
            }
        }
    }
</script>

<style scoped>

</style>
