<template>
    <form method="POST" enctype="multipart/form-data">
        <div class="c-form__group">
            <label class="c-form__label">{{ convini_pic }}</label>
            <input id="pic" type="file"　class="c-form__item" name="convini_pic" >
            <img class="c-pic" v-bind:src="'/storage/' + convini_pic">
        </div>
        <button type="submit" class="btn btn-primary" v-on:click.prevent="uploadPic">
            アップロードする
        </button>
    </form>
</template>

<script>
    export default {
        props:['convini_pic'],
        methods: {
            uploadPic: function(e){
                axios.post('/convini/uploadProfilePic',{
                    convini_pic: this.convini_pic,
                }).then((res)=>{
                    console.log(this.convini_pic)
                })
            }
        },
    }
</script>



////fileupload
            uploadPic: function(e){
                var self = this;
                this.errors = {
                    convini_name: '',
                    branch_name: '',
                    prefectures: '',
                    address:'',
                    email:'',
                    convini_pic:'',
                };
                const formData = new FormData();
                formData.append('file',this.convini.convini_pic),
                console.log(formData.get('file'));
                axios.post('/convini/uploadProfilePic',{
                    // convini: this.convini,
                    convini_name: this.convini.convini_name,
                    branch_name: this.convini.branch_name,
                    prefectures: this.convini.prefectures,
                    address: this.convini.address,
                    email: this.convini.email,
                }).then(function(){
                    self.erros = [];
                }).catch(function(error){
                    // console.log(error.response.data.errors);
                    // console.log(error.response.data.errors['convini_name']);
                    // self.errors['convini_name'] = error.response.data.errors['convini_name'];
                    for(var key in error.response.data.errors) {
                        // console.log(key);
                        self.errors[key] = error.response.data.errors[key][0];

                    }
                 });
            }