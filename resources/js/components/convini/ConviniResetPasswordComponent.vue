<template>
    <div>
        <input type="hidden" name="token" v-bind:value="token">
        <div class="c-form__group">
            <label>Email</label>
            <div class="c-form__item">
                <input type="text"  v-model="email" v-on:keyup.enter="resetPassword" name="email">
                <div v-if="errors.token" class="c-invalid__feedback">{{ errors.token }}</div>
                <div v-if="errors.email" class="c-invalid__feedback">{{ errors.email }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label>パスワード</label>
            <div class="c-form__item">
                <input type="password"  v-model="password" v-on:keyup.enter="resetPassword" name="password">
                <div v-if="errors.password" class="c-invalid__feedback">{{ errors.password }}</div>
            </div>
        </div> 
        <div class="c-form__group">
            <label>パスワード（再入力)</label>
            <div class="c-form__item">
                <input type="password"  name="password_confirm" v-model="password_confirmation" v-on:keyup.enter="resetPassword" autocomplete="password" >
                <div v-if="errors.password_confirm" class="c-invalid__feedback">{{ errors.password_confirmation }}</div>
            </div>
        </div>  
        <button type="submit" class="c-button" v-on:click="resetPassword">
            リセットする
        </button>
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
                    location.href = '../../home'
                }).catch(function(error){
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                 });
            },
        },        
    }
</script>