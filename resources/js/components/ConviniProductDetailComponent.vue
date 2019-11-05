<template>
    <div>
        <h2 class="c-page__title">{{ product.product_name }}</h2>
        <img class="p-pic" v-bind:src="'storage/' + product.product_pic">
        <div class="p-product__description">
            <p><span>¥</span>{{ product.price | number_format }}</p>
            <p>賞味期限: {{ product.expiration_date| date_time }}</p>
        </div>
        <div class="c-form__button">
            <button type="submit" class="c-button" v-on:click="productEdit"  v-if="product.convini_id == convini.id">
                編集する
            </button>
        </div>
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-url="https://haiki-share.com/haiki-share/public/convini/productDetail/1" v-bind:data-text="tweetMessage" data-show-count="false">Tweet</a>
    </div>
</template>
<script>
    const moment = require('moment');
    Vue.filter('number_format', function(val){
        return val.toLocaleString();
    });

    Vue.filter('date_time', function(val){
        return moment(val).format('YY/MM/DD HH:mm');
    });

    export default {
        props:['categories','product','convini'],
        data: function() {
            return { 
            }
        },
        methods: {
            //商品編集画面へ遷移
            productEdit: function(e){
                location.href = '../../convini/productEdit/' + this.product.id;
            }
        },
        computed: {
            tweetMessage: function(){
                var message = this.product.product_name + 'を' + this.product.price.toLocaleString() + '円で販売中!';
                return message;
            }
        },
    }
</script>