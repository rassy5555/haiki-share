<template>
    <div>
        <div class="c-image__group p-image__group-large">
            <img class="p-pic" :src="preview_image" v-if="preview_image">
            <img class="p-pic" v-else-if="product.product_pic" v-bind:src="'../storage/' + product.product_pic">
            <img class="p-pic" v-bind:src="'../storage/' + no_image" v-else>
            <label class="c-pic__label">画像を変更
                <input type="file" v-on:change="file_selected" name="product_pic" style="display:none">
            </label>
            <div v-if="errors.product_pic" class="c-invalid__feedback">{{ errors.product_pic }}</div>
        </div>
        <div class="c-form__group">
            <label>商品名</label>
            <div class="c-form__item">
                <input id="product_name" type="text"  name="product_name" v-model:value="product.product_name">
                <div v-if="errors.product_name" class="c-invalid__feedback">{{ errors.product_name }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label>カテゴリー</label>
            <div class="c-form__item">
                <select id="category" type="text"  name="category" v-model:value="product.category_id">
                    <option disabled selected value>選択してください</option>
                    <option v-for="(category,index) in categories" v-bind:value="category.id">{{ category.category_name }}</option>
                </select>
                    <div v-if="errors.category_id" class="c-invalid__feedback">{{ errors.category_id }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label>価格(円)</label>
            <div class="c-form__item">
                <input id="price" type="number"  name="price" v-model:value="product.price">
                <div v-if="errors.price" class="c-invalid__feedback">{{ errors.price }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label>賞味期限</label>
            <div class="c-form__item">
                <datetime format="YYYY-MM-DD H:i" width="200px" name="expiration_date" v-model="product.expiration_date"></datetime>
                <div v-if="errors.expiration_date" class="c-invalid__feedback">{{ errors.expiration_date }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label>コメント</label>
            <div class="c-form__item">
                <textarea type="text" class="p-form__comment" name="comment" v-model:value="product.comment"></textarea>
                <div v-if="errors.comment" class="c-invalid__feedback">{{ errors.comment }}</div>
            </div>
        </div>
        <button type="submit" class="c-button"  v-on:click="productRegister">
            登録する
        </button>
        <p class="p-message__success" v-if="success_message" >{{ success_message }}</p>
    </div>
</template>
<script>
    import datetime from 'vuejs-datetimepicker';
    export default {
        props: ['categories'],
        data: function(){
            return{
                no_image: 'no-image2.png',
                product: {
                    product_name:'',
                    price: '',
                    category_id:'',
                    expiration_date: '',
                    comment: '',
                    product_pic:'',
                },
                success_message: '',
                errors: {
                    product_name:'',
                    price: '',
                    category_id:'',
                    expiration_date:'',
                    comment: '',
                    product_pic:'',
                },
                file_info:'',
                preview_image:'',
            }
        },
        components: {
            datetime
        },
        methods:{
            productRegister: function(e){
                var self = this;
                this.errors = {
                    product_name:'',
                    price: '',
                    category_id:'',
                    expiration_date:'',
                    comment: '',
                    product_pic:'',
                };
                const formData = new FormData();
                formData.append('product_name',this.product.product_name),
                formData.append('category_id',this.product.category_id),
                formData.append('price',this.product.price),
                formData.append('expiration_date',this.product.expiration_date),
                formData.append('comment',this.product.comment),
                formData.append('product_pic',this.file_info),
                axios.post('productRegister',formData,
                ).then(function(){
                    self.success_message = '商品を登録しました';
                    self.erros = [];
                    location.href = "home?flash_message=productRegister";
                }).catch(function(error){
                    self.success_message = '';
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                });
            },
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
        }
    }
</script>