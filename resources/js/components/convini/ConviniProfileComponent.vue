<template>
    <div>
        <div class="p-page__title-wrapper">
            <div class="c-page__title p-page__title-switch" v-bind:class="{'active': edit_mode == 'profile'}" v-on:click="profile_mode">プロフィール編集</div>
            <div class="c-page__title p-page__title-switch" v-bind:class="{'active': edit_mode == 'password'}" v-on:click="password_mode">パスワード変更</div>
        </div>
        <form method="POST" enctype="multipart/form-data" v-if="edit_mode == 'profile'">
            <div class="c-image__group">
                <img class="c-pic p-pic__profile" :src="preview_image" v-if="preview_image">
                <img class="c-pic p-pic__profile" v-bind:src="'../storage/' + convini.convini_pic" v-else>
                <label class="c-pic__label">画像を変更
                    <input type="file" v-on:change="file_selected" name="convini_pic" style="display:none">
                </label>
                <div v-if="errors.convini_pic" class="c-invalid__feedback">{{ errors.convini_pic }}</div>
            </div>
            <div class="c-form__group">
                <label>コンビニ名</label>
                <div class="c-form__item">
                    <input id="convini_name" type="text"  name="convini_name" v-model:value="convini.convini_name" v-on:keyup.enter="profileEdit" autocomplete="convini_name" >
                    <div v-if="errors.convini_name" class="c-invalid__feedback">{{ errors.convini_name }}</div>
                </div>
            </div>
            <div class="c-form__group">
                <label>支店名</label>
                <div class="c-form__item">
                    <input id="branch_name" type="text"  name="branch_name" v-model:value="convini.branch_name" v-on:keyup.enter="profileEdit"  autocomplete="branch_name" >
                    <div v-if="errors.branch_name" class="c-invalid__feedback">{{ errors.branch_name }}</div>
                </div>
            </div>
            <div class="c-form__group">
                <label>都道府県</label>
                <div class="c-form__item">
                    <select id="prefectures" type="text"  name="prefectures" v-model:value="convini.prefectures" v-on:keyup.enter="profileEdit" autocomplete="prefectures" >
                        <option v-for="(prefecture,index) in prefectures" :value="index" v-text="prefecture"></option>
                    </select> 
                    <div v-if="errors.prefectures" class="c-invalid__feedback">{{ errors.prefectures }}</div>
                </div>
            </div>
            <div class="c-form__group">
                <label>住所</label>
                <div class="c-form__item">
                    <input id="address" type="text"  name="address" v-model:value="convini.address" v-on:keyup.enter="profileEdit"  autocomplete="address" >
                    <div v-if="errors.address" class="c-invalid__feedback">{{ errors.address }}</div>
                </div>
            </div>
            <div class="c-form__group">
                <label>Eメール</label>
                <div class="c-form__item">
                    <input id="email" type="text"  name="email" v-model:value="convini.email" v-on:keyup.enter="profileEdit"  autocomplete="email" >
                    <div v-if="errors.email" class="c-invalid__feedback">{{ errors.email }}</div>
                </div>
            </div>
            <button type="submit" class="c-button" v-on:click.prevent="profileEdit">
                編集する
            </button>
            <p class="p-message__success">{{ success_message.profile }}</p>
        </form>
        <form method="POST" enctype="multipart/form-data" v-else>
            <div class="c-form__group">
                <label>現在のパスワード</label>
                <div class="c-form__item">
                    <input id="old_password" type="password"  name="old_password" v-model:value="old_password" v-on:keyup.enter="changePassword" autocomplete="password" >
                    <div v-if="errors.old_password" class="c-invalid__feedback">{{ errors.old_password }}</div>
                </div>
            </div> 
            <div class="c-form__group">
                <label>新しいパスワード</label>
                <div class="c-form__item">
                    <input id="password" type="password"  name="password" v-model:value="convini.password" v-on:keyup.enter="changePassword" autocomplete="password" >
                    <div v-if="errors.password" class="c-invalid__feedback">{{ errors.password }}</div>
                </div>
            </div> 
            <div class="c-form__group">
                <label>新しいパスワード(再入力)</label>
                <div class="c-form__item">
                    <input id="password_confirm" type="password"  name="password_confirm" v-model:value="password_confirm" v-on:keyup.enter="changePassword" autocomplete="password" >
                    <div v-if="errors.password_confirm" class="c-invalid__feedback">{{ errors.password_confirm }}</div>
                </div>
            </div>    
            <button type="submit" class="c-button" v-on:click.prevent="changePassword">
                パスワードを変更する
            </button>
            <p class="p-message__success">{{ success_message.password }}</p>
        </form>
    </div>
</template>

<script>
    import prefectures_data from '../../master/prefectures'
    export default {
        props:['props_convini'],
        data: function() {
           return {
                convini: this.props_convini,
                old_password:'',
                password_confirm:'',
                edit_mode: 'profile',
                file_info:'',
                preview_image: '',
                prefectures: prefectures_data,
                success_message: {
                    profile: '',
                    password: '',
                },
                errors: {
                    convini_name: '',
                    branch_name: '',
                    prefectures: '',
                    address:'',
                    email:'',
                    convini_pic:'',
                    old_password:'',
                    password:'',
                    password_confirm:'',
                } ,           
            }
        },
        methods: {
            //プロフィール編集処理
            profileEdit: function(e){
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
                formData.append('convini_name',this.convini.convini_name),
                formData.append('branch_name',this.convini.branch_name),
                formData.append('prefectures',this.convini.prefectures),
                formData.append('address',this.convini.address),
                formData.append('email',this.convini.email),
                formData.append('convini_pic',this.file_info),
                axios.post('profileEdit',formData,
                ).then(function(){
                    self.erros = [];
                    self.success_message.profile = 'プロフィールを編集しました';
                }).catch(function(error){
                    self.success_message.profile = '';
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                 });
            },
            //画像プレビュー表示
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
            //パスワード変更処理
            changePassword: function(e){
                var self = this;
                this.errors = {
                    old_password:'',
                    password:'',
                };
                axios.post('changePassword',{
                    old_password: this.old_password,
                    password: this.convini.password,
                    password_confirm: this.password_confirm,
                }).then(function(){
                    self.erros = [];
                    self.success_message.password = 'パスワードを変更しました';
                }).catch(function(error){
                    self.success_message.password = '';
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                });
            },
            //表示モードをプロフィール編集に切替
            profile_mode: function(e){
                this.edit_mode = 'profile';
            },
            //表示モードをパスワード変更に切替
            password_mode: function(e){
                this.edit_mode = 'password';
            },   
        },        
    }
</script>