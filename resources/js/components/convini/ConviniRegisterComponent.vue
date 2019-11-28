<template>
    <div>
        <div class="c-form__group">
            <label>コンビニ名</label>
            <div class="c-form__item">
                <input id="convini_name" type="text"  name="convini_name" v-model="convini_name" v-on:keyup.enter="register">
                <div v-if="errors.convini_name" class="c-invalid__feedback">{{ errors.convini_name }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label>支店名</label>
            <div class="c-form__item">
                <input id="branch_name" type="text"  name="branch_name" v-model="branch_name" v-on:keyup.enter="register">
                <div v-if="errors.branch_name" class="c-invalid__feedback">{{ errors.branch_name }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label>E-mail</label>
            <div class="c-form__item">
                <input id="email" type="text"  name="email" v-model="email" v-on:keyup.enter="register">
                <div v-if="errors.email" class="c-invalid__feedback">{{ errors.email }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label>都道府県</label>
            <div class="c-form__item">
                <select id="prefectures" type="text"  name="prefectures" v-model="prefecture" v-on:keyup.enter="register">
                    <option selected v-for="(prefecture,index) in prefectures" :value="index" v-text="prefecture"></option>
                </select> 
                <div v-if="errors.prefectures" class="c-invalid__feedback">{{ errors.prefectures }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label>住所</label>
            <div class="c-form__item">
                <input id="address" type="text"  name="address" v-model="address" v-on:keyup.enter="register">
                <div v-if="errors.address" class="c-invalid__feedback">{{ errors.address }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label>パスワード</label>
            <div class="c-form__item">
                <input id="password" type="password"  name="password"  v-model="password" v-on:keyup.enter="register">
                <div v-if="errors.password" class="c-invalid__feedback">{{ errors.password }}</div>
            </div>
        </div> 
        <div class="c-form__group">
            <label>パスワード（再入力）</label>
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
    import prefectures_data from '../../master/prefectures'
    export default {
        data: function(){
            return{
                convini_name: '',
                branch_name: '',
                prefecture: 1,
                prefectures: prefectures_data,
                address:'',
                email: '',
                password: '',
                password_confirm: '',
                errors: {
                    convini_name: '',
                    branch_name: '',
                    prefecture: '',
                    address:'',
                    email: '',
                    password: '',
                    password_confirm: '',
                }
            }
        },
        methods: {
            //ログイン処理
            register: function(e){
                var self = this;
                this.errors = {
                    convini_name: '',
                    branch_name: '',
                    prefecture: '',
                    address:'',
                    email: '',
                    password: '',
                    password_confirm: '',
                };
                axios.post('register',{
                    convini_name: this.convini_name,
                    branch_name: this.branch_name,
                    prefecture: this.prefecture,
                    address: this.address,
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