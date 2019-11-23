<template>
    <div>
        <input type="hidden" name="token" v-bind:value="token">
        <div class="c-form__group">
            <label class="c-form__label">Email</label>
            <div class="c-form__item">
                <input type="text" class="c-form__input" v-model="email" name="email">
                <div v-if="errors.email" class="c-invalid__feedback">{{ errors.email }}</div>
                <div v-if="errors.token" class="c-invalid__feedback">{{ errors.token }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label class="c-form__label">パスワード</label>
            <div class="c-form__item">
                <input type="password" class="c-form__input" v-model="password" name="password">
                <div v-if="errors.password" class="c-invalid__feedback">{{ errors.password }}</div>
            </div>
        </div> 
        <div class="c-form__group">
            <label class="c-form__label">パスワード（再入力)</label>
            <div class="c-form__item">
                <input type="password" class="c-form__input" name="password_confirm" v-model="password_confirmation" autocomplete="password" >
                <div v-if="errors.password_confirm" class="c-invalid__feedback">{{ errors.password_confirmation }}</div>
            </div>
        </div>  
        <div class="c-form__button">
            <button type="submit" class="c-button" v-on:click="resetPassword">
                パスワードを再設定する
            </button>
        </div>
    </div>
</template>
<script>
    export default {
        props:['token'],
        data: function(){
            return{
                email: '',
                password: '',
                password_confirmation: '',
                errors: {
                    token: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                }
            }
        },
        methods: {
            //パスワードリセット処理
            resetPassword: function(e){
                var self = this;
                this.errors = {
                    token:'',
                    email:'',
                    password: '',
                    password_confirmation: '',
                };
                axios.post('../reset',{
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                    token: this.token,
                }).then(function(){
                    self.erros = [];
                    location.href = '../../../home'
                }).catch(function(error){
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                 });
            },
        },        
    }
</script>