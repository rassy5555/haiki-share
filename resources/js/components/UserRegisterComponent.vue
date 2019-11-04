<template>
    <div>
        <div class="c-form__group">
            <label class="c-form__label">名前</label>
            <div class="c-form__item">
                <input id="name" type="text" class="c-form__input" name="name" v-model="name">
                <div v-if="errors.name" class="c-invalid__feedback">{{ errors.name }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label class="c-form__label">Email</label>
            <div class="c-form__item">
                <input id="email" type="text" class="c-form__input" v-model="email" name="email">
                <div v-if="errors.email" class="c-invalid__feedback">{{ errors.email }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label class="c-form__label">パスワード</label>
            <div class="c-form__item">
                <input id="password" type="password" class="c-form__input" v-model="password" name="password">
                <div v-if="errors.password" class="c-invalid__feedback">{{ errors.password }}</div>
            </div>
        </div> 
        <div class="c-form__group">
            <label class="c-form__label">パスワード（再入力)</label>
            <div class="c-form__item">
                <input id="password_confirm" type="password" class="c-form__input" name="password_confirm" v-model="password_confirm" autocomplete="password" >
                <div v-if="errors.password_confirm" class="c-invalid__feedback">{{ errors.password_confirm }}</div>
            </div>
        </div>  
        <div class="c-form__button">
            <button type="submit" class="c-button" v-on:click="login">
                新規登録
            </button>
        </div>
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
            login: function(e){
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