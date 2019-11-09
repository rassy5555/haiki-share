<template>
    <div>
        <div class="c-form__group">
            <label class="c-form__label">Email</label>
            <div class="c-form__item">
                <input id="email" type="text" class="c-form__input" v-model="email" name="email">
                <div v-if="errors.email" class="c-invalid__feedback">{{ errors.email }}</div>
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
        data: function(){
            return{
                email: '',
                errors: {
                    email: '',
                }
            }
        },
        methods: {
            resetPassword: function(e){
                var self = this;
                this.errors = {
                    email:'',
                };
                axios.post('email',{
                    email: this.email,
                }).then(function(){
                    self.erros = [];
                }).catch(function(error){
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                 });
            },
        },        
    }
</script>