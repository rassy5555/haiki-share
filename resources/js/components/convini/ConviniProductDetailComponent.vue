<template>
    <div>
        <h2 class="c-page-title ">{{ product.product_name }}</h2>
        <img class="p-pic" v-bind:src="'../../storage/' + product.product_pic">
        <table class="p-product__detail">
            <tr><th>賞味期限</th></tr>
            <tr><td>{{ product.expiration_date| date_time }}</td></tr>
            <tr><th>価格</th></tr>
            <tr><td><span>¥</span>{{ product.price | number_format }}</td></tr>
            <tr><th>コメント</th></tr>
            <tr><td>{{ product.comment }}</td></tr>
        </table>
        <button type="submit" class="c-button" v-on:click="productEdit"  v-if="product.convini_id == convini.id">
            編集する
        </button>
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" v-bind:data-url="tweetURL" v-bind:data-text="tweetMessage" data-show-count="false">Tweet</a>
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
                tweetURL: 'https://haiki-share.com/convini/productDetail/' + this.product.id,
            }
        },
        methods: {
            //商品編集画面へ遷移
            productEdit: function(e){
                location.href = '../productEdit/' + this.product.id;
            }
        },
        computed: {
            //twitterシェア時の文面
            tweetMessage: function(){
                var message = this.product.product_name + 'を' + this.product.price.toLocaleString() + '円で販売中!';
                return message;
            }
        },
    }
</script>