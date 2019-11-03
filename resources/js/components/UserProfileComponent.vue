<template>
    <div>
        <div>
            <h2 class="c-page__title" v-on:click="profile_mode">プロフィール編集</h2>
            <h2 class="c-page__title" v-on:click="password_mode">パスワード変更</h2>
        </div>
        <form method="POST" enctype="multipart/form-data" v-if="edit_mode == 'profile'">
            <div class="c-image__group">
                <img class="p-pic__profile" :src="preview_image" v-if="preview_image">
                <img class="p-pic__profile" v-bind:src="'/storage/' + user.user_pic" v-else>
                <label class="c-pic__label">画像を変更
                    <input type="file" v-on:change="file_selected" name="user_pic" style="display:none">
                </label>
                <div v-if="errors.user_pic" class="c-invalid__feedback">{{ errors.user_pic }}</div>
            </div>  
            <div class="c-form__group">
                <label class="c-form__label">名前</label>
                <div class="c-form__item">
                    <input id="name" type="text" class="c-form__input" name="name" v-model:value="user.name"  autocomplete="name" >
                    <div v-if="errors.name" class="c-invalid__feedback">{{ errors.name }}</div>
                </div>
            </div>
            <div class="c-form__group">
                <label class="c-form__label">Eメール</label>
                <div class="c-form__item">
                    <input id="email" type="text" class="c-form__input" name="email" v-model:value="user.email"  autocomplete="email" >
                    <div v-if="errors.email" class="c-invalid__feedback">{{ errors.email }}</div>
                </div>
            </div>
            <button type="submit" class="c-button" v-on:click.prevent="profileEdit">
                編集する
            </button>
        </form>
        <form method="POST" enctype="multipart/form-data" v-else>
            <div class="c-form__group">
                <label class="c-form__label">現在のパスワード</label>
                <div class="c-form__item">
                    <input id="old_password" type="password" class="c-form__input" name="old_password" v-model:value="old_password" autocomplete="password" >
                    <div v-if="errors.old_password" class="c-invalid__feedback">{{ errors.old_password }}</div>
                </div>
            </div> 
            <div class="c-form__group">
                <label class="c-form__label">新しいパスワード</label>
                <div class="c-form__item">
                    <input id="password" type="password" class="c-form__input" name="password" v-model:value="user.password" autocomplete="password" >
                    <div v-if="errors.password" class="c-invalid__feedback">{{ errors.password }}</div>
                </div>
            </div> 
            <div class="c-form__group">
                <label class="c-form__label">新しいパスワード（再入力）</label>
                <div class="c-form__item">
                    <input id="password_confirm" type="password" class="c-form__input" name="password_confirm" v-model:value="password_confirm" autocomplete="password" >
                    <div v-if="errors.password_confirm" class="c-invalid__feedback">{{ errors.password_confirm }}</div>
                </div>
            </div>    
            <div class="c-form__group">
                <div class="c-form__button">
                    <button type="submit" class="c-button" v-on:click.prevent="changePassword">
                        パスワードを変更する
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import prefectures_data from '../master/prefectures'
    export default {
        props:['props_user'],
        data: function(){
            return{
                user: this.props_user,
                edit_mode: 'profile',
                old_password:'',
                password_confirm:'',
                file_info:'',
                preview_image: '',
                errors: {
                    name: '',
                    email: '',
                    user_pic: '',
                    password: '',
                    old_password: '',
                    password_confirm: '',
                }
            }
        },
        methods: {
            profileEdit: function(e){
                var self = this;
                this.errors = {
                    name: '',
                    email:'',
                    user_pic:'',
                };
                const formData = new FormData();
                formData.append('name',this.user.name),
                formData.append('email',this.user.email),
                formData.append('user_pic',this.file_info),
                axios.post('/profileEdit',formData,
                ).then(function(){
                    self.erros = [];
                }).catch(function(error){
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                 });
            },
            file_selected(event){
                this.file_info = event.target.files[0];
                if(this.file_info){
                    const file = this.file_info;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.preview_image = e.target.result;
                    };
                    reader.readAsDataURL(file);                
                }
            },
            changePassword: function(e){
                var self = this;
                this.errors = {
                    old_password:'',
                    password:'',
                };
                axios.post('/changePassword',{
                    old_password: this.old_password,
                    password: this.user.password,
                    password_confirm: this.password_confirm,
                }).then(function(){
                    self.erros = [];
                }).catch(function(error){
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                });
            },
            profile_mode: function(e){
                this.edit_mode = 'profile';
            },
            password_mode: function(e){
                this.edit_mode = 'password';
            },        
        },        
    }
</script>