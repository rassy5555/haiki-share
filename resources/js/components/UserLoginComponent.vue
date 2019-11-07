<template>
    <div>
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
        <div class="c-form__button">
            <button type="submit" class="c-button" v-on:click="login">
                ログイン
            </button>
        </div>
        <div class="c-form__group">
            <a class="btn btn-link" href="password/reset">
            パスワードを忘れた方
            </a>
        </div>
    </div>
</template>
<script>
    export default {
        data: function(){
            return{
                email: '',
                password: '',
                errors: {
                    email: '',
                    password: '',
                }
            }
        },
        methods: {
            login: function(e){
                var self = this;
                this.errors = {
                    email:'',
                    password:'',
                };
                axios.post('login',{
                    email: this.email,
                    password: this.password,
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