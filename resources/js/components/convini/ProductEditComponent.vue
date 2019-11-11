<template>
    <div>
        <div class="c-image__group p-image__group-large">
            <img class="p-pic" :src="preview_image" v-if="preview_image">
            <img class="p-pic" v-else-if="product.product_pic" v-bind:src="'../../storage/' + product.product_pic">
            <img class="p-pic" src="/../storage/no-image2.png" v-else>
            <label class="c-pic__label">画像を変更
                <input type="file" v-on:change="file_selected" name="product_pic" style="display:none">
            </label>
            <div v-if="errors.product_pic" class="c-invalid__feedback">{{ errors.product_pic }}</div>
        </div>
        <div class="c-form__group">
            <label class="c-form__label">商品名</label>
            <div class="c-form__item">
                <input id="product_name" type="text" class="c-form__input" name="product_name" v-model:value="product.product_name">
                <div v-if="errors.product_name" class="c-invalid__feedback">{{ errors.product_name }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label class="c-form__label">カテゴリー</label>
            <div class="c-form__item">
                <select id="category" type="text" class="c-form__input" name="category" v-model:value="product.category_id" autocomplete="prefectures">
                    <option disabled selected value>選択してください</option>
                    <option v-for="(category,index) in categories" v-bind:value="category.id">{{ category.category_name }}</option>
                </select>
                    <div v-if="errors.category_id" class="c-invalid__feedback">{{ errors.category_id }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label class="c-form__label">価格(円)</label>
            <div class="c-form__item">
                <input id="price" type="number" class="c-form__input" name="price" v-model:value="product.price">
                <div v-if="errors.price" class="c-invalid__feedback">{{ errors.price }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label class="c-form__label">賞味期限</label>
            <div class="c-form__item">
                <datetime format="YYYY-MM-DD H:i" width="200px" name="expiration_date" v-model="expiration_date"></datetime>
                <div v-if="errors.expiration_date" class="c-invalid__feedback">{{ errors.expiration_date }}</div>
            </div>
        </div>
        <div class="c-form__group">
            <label class="c-form__label">コメント</label>
            <div class="c-form__item">
                <textarea type="text" class="c-form__input p-form__comment" name="comment" v-model="product.comment"></textarea>
                <div v-if="errors.comment" class="c-invalid__feedback">{{ errors.comment }}</div>
            </div>
        </div>
        <div class="c-form__button">
            <button type="submit" class="c-button" v-bind:class="{ 'p-button_saled': this.product.saled_flg }" v-on:click.prevent="productRegister">
                編集する
            </button>
        </div>
        <div class="c-form__button">
            <button type="submit" class="c-button" v-bind:class="{ 'p-button_saled': this.product.saled_flg }"  v-on:click.prevent="productDelete">
                削除する
            </button>
        </div>
        <p class="p-success_message" v-if="success_message" >{{ success_message }}</p>
    </div>
</template>
<script>
    import datetime from 'vuejs-datetimepicker';
    const moment = require('moment');
    export default {
        props: ['categories','product'],
        data: function(){
            return{
                expiration_date: moment(this.product.expiration_date).format( "YYYY-MM-DD HH:mm"),
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
            //商品登録処理
            productRegister: function(e){
                var self = this;
                const formData = new FormData();
                formData.append('product_name',this.product.product_name),
                formData.append('category_id',this.product.category_id),
                formData.append('price',this.product.price),
                formData.append('expiration_date',this.expiration_date),
                formData.append('comment',this.product.comment),
                formData.append('product_pic',this.file_info),
                axios.post('../productEdit/' + this.product.id ,formData
                ).then(function(){
                    self.success_message = '商品を編集しました';
                    self.errors = [];
                }).catch(function(error){
                    self.success_message = '';
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                });
            },
            //商品削除処理
            productDelete: function(e) {
                axios.post('../productDelete/' + this.product.id ,
                ).then(function(){
                    self.success_message = '商品を削除しました';
                    self.errors = [];
                    location.href = "../home"
                }).catch(function(error){
                });           
             },
            //画像プレビュー表示
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