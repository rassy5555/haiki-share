<template>
    <div>
        <div class="c-form__group">
            <label>名前</label>
            <div class="c-form__item">
                <input id="name" type="text" name="name" v-model="name" v-on:keyup.enter="register">
                <div v-if="errors.name" class="c-invalid__feedback">{{ errors.name }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label>Email</label>
            <div class="c-form__item">
                <input id="email" type="text"  v-model="email" v-on:keyup.enter="register" name="email">
                <div v-if="errors.email" class="c-invalid__feedback">{{ errors.email }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label>パスワード</label>
            <div class="c-form__item">
                <input id="password" type="password"  v-model="password" v-on:keyup.enter="register" name="password">
                <div v-if="errors.password" class="c-invalid__feedback">{{ errors.password }}</div>
            </div>
        </div> 
        <div class="c-form__group">
            <label>パスワード（再入力)</label>
            <div class="c-form__item">
                <input id="password_confirm" type="password"  name="password_confirm" v-model="password_confirm" v-on:keyup.enter="register">
                <div v-if="errors.password_confirm" class="c-invalid__feedback">{{ errors.password_confirm }}</div>
            </div>
        </div>  
        <button type="submit" class="c-button" v-on:click="register">
            新規登録
        </button>
    </div>
</template>
<script>
    export default {
        data: function(){
            return{
                name: '',
                email: '',
                password: '',
                password_confirm: '',
                errors: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirm: '',
                }
            }
        },
        methods: {
            //新規登録処理
            register: function(e){
                var self = this;
                this.errors = {
                    name: '',
                    email:'',
                    password: '',
                    password_confirm: '',
                };
                axios.post('register',{
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirm: this.password_confirm,
                }).then(function(){
                    self.erros = [];
                    location.href = 'home'
                }).catch(function(error){
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                 });
            },
        },        
    }
</script>