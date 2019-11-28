<template>
    <div>
        <div class="c-form__group">
            <label>登録済カテゴリー</label>
            <div class="c-form__item">
                <select id="category" type="text"  name="category">
                    <option v-for="(category,index) in categories" v-bind:value="category.id">{{ category.category_name }}</option>
                </select>
                <div class="p-notes">＊同様のカテゴリーがないか確認してください。</div>
            </div>
        </div>
        <div class="c-form__group">
            <label>登録するカテゴリー</label>
            <div class="c-form__item">
                <input id="category_name" type="text"  name="product_name" v-model:value="category_name">
                <div v-if="errors.category_name" class="c-invalid__feedback">{{ errors.category_name }}</div>
            </div>
        </div>
        <button type="submit" class="c-button"  v-on:click="categoryRegister">
            登録する
        </button>
    </div>
</template>
<script>
    export default {
        props: ['categories'],
        data: function(){
            return{
                category_name: '',
                errors: {
                    category_name: '',
                }
            }
        },
        methods:{
            categoryRegister: function(e){
                var self = this;
                this.errors = {
                    category_name: ''
                };
                axios.post('categoryRegister',{
                    category_name: this.category_name,
                },
                ).then(function(){
                    self.success_message = 'カテゴリーを登録しました';
                    self.erros = [];
                    location.href = "home?flash_message=categoryRegister";
                }).catch(function(error){
                    self.success_message = '';
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                });
            },
        }
    }
</script>