<template>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" enctype="multipart/form-data" @submit.prevent="updatePost()">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text"
                                           class="form-control"
                                           id="title"
                                           v-model="form.title"
                                           placeholder="Enter post title"
                                           name="title"
                                           :class="{ 'is-invalid': form.errors.has('title') }"
                                    >
                                    <has-error :form="form" field="title"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="description">Select Category</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('cat_id') }" v-model="form.cat_id">
                                        <option value=""  disabled>Select Category</option>
                                        <option v-for="category in getAllCategory" :value="category.id">{{category.cat_name}}</option>
                                    </select>
                                    <has-error :form="form" field="cat_id"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Upload Photo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" @change="changePhoto($event)" class="custom-file-input" id="photo" name="photo" :class="{ 'is-invalid': form.errors.has('photo') }">
                                            <label class="custom-file-label" for="photo">Choose photo</label>
                                        </div>
                                    </div>
                                    <has-error :form="form" field="photo"></has-error>
                                    <img :src="updateImage()" alt="" width="150/">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <ckeditor :editor="editor" v-model="form.description"></ckeditor>
                                    <has-error :form="form" field="description"></has-error>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button :disabled="form.busy" type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    // CKEditor
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    export default {
        name: "Editpost",
        data(){
            return {
                editor: ClassicEditor,
                form: new Form({
                    title       : '',
                    description : '',
                    photo       : '',
                    cat_id      : '',
                    user_id     : ''
                })
            }
        },
        mounted() {
            this.$store.dispatch('LocalAllCategory');
        },
        created() {
            axios.get(`/api/posts/edit/${this.$route.params.postId}`)
                .then((response) => {
                    this.form.fill(response.data.post);
                })
                .catch(() => {

            })
        },
        computed:{
            getAllCategory(){
                // return this.$store.getters.getCategory
                return this.$store.getters.getlocalCategory
            }
        },
        methods: {
            changePhoto(event){
                let file = event.target.files[0];
                if (file.size > 323456){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>Why do I have this issue?</a>'
                    })
                } else{
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.photo = event.target.result
                    };
                    reader.readAsDataURL(file);
                }
            },
            updateImage(){
                let img = this.form.photo;
                if(img.length > 100){
                    return this.form.photo
                }else{
                    return `/images/${this.form.photo}`
                }
            },
            updatePost(){
                this.form.post(`/post/update/${this.$route.params.postId}`)
                    .then(() => {
                        this.$router.push('/posts/all');
                        Toast.fire({
                            icon: 'success',
                            title: 'Post has been Updated successfully'
                        });
                    })
                    .catch(() => {

                    })
            }

        }
    }

</script>
<style>
    .ck-editor__editable_inline {
        min-height: 150px !important;
    }
</style>
