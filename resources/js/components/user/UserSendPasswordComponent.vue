<template>
    <div>
        <div class="c-form__group">
            <label>Email</label>
            <div class="c-form__item">
                <input id="email" type="text" v-model="email" name="email">
                <div v-if="errors.email" class="c-invalid__feedback">{{ errors.email }}</div>
            </div>
        </div>
        <button type="submit" class="c-button" v-on:click="resetPassword">
            パスワードを再設定する
        </button>
        <p class="p-success__message" v-if="success_message" >{{ success_message }}</p>
    </div>
</template>
<script>
    export default {
        data: function(){
            return{
                email: '',
                success_message: '',
                errors: {
                    email: '',
                }
            }
        },
        methods: {
            //パスワードリマインダー用メールを送信
            resetPassword: function(e){
                var self = this;
                this.errors = {
                    email:'',
                };
                axios.post('email',{
                    email: this.email,
                }).then(function(){
                    self.success_message = 'メールを送信しました';
                    self.erros = [];
                }).catch(function(error){
                    self.success_message = '';
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                 });
            },
        },        
    }
</script>