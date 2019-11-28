<template>
    <div>
        <h2 class="c-page-title">{{ product.product_name }}</h2>
        <img class="p-pic" v-bind:src="'../storage/' + product.product_pic">
        <div class="p-product__detail">
            <p>{{ product.convini_name }}</p>
            <p>{{ product.branch_name }}</p>
            <p>{{ product.address }}</p>
            <p>賞味期限: {{ product.expiration_date| date_time }}</p>
            <p><span>¥</span>{{ product.price | number_format }}</p>
            <p class="p-comment__detail">{{ product.comment }}</p>
        </div>
        <div class="c-form__button">
            <button type="submit" class="c-button" v-on:click.prevent="showModal" v-if="this.saled_flg==true && product.user_id === user.id ">
                購入をキャンセルする
            </button>
            <button type="submit" class="c-button" v-bind:class="{ 'p-button__saled': this.saled_flg }" v-on:click.prevent="showModal" v-else>
                購入する
            </button>
            <p class="p-message__success" v-if="success_message.cancel" >{{ success_message.cancel }}</p>
            <p class="p-message__success" v-if="success_message.purchase" >{{ success_message.purchase }}</p>
        </div>
        <div class="p-modal__cover" v-show='confirm_mode' v-on:click="closeModal">
        </div>
        <div class="l-modal__wrapper p-modal__wrapper">
            <div class="l-modal__container p-modal__container" v-if="confirm_mode=='purchase'">
                <p>購入しますか?</p>
                <div class="p-button__wrapper">
                    <button type="submit" class="c-button p-button__small" v-on:click="productPurchase">
                        はい
                    </button>    
                    <button type="submit" class="c-button p-button__small" v-on:click="closeModal">
                        いいえ
                    </button> 
                </div>
            </div>
            <div class="l-modal__container p-modal__container" v-else-if="confirm_mode=='cancel'">
                <p>購入をキャンセルしますか?</p>
                <div class="p-button__wrapper">
                    <button type="submit" class="c-button p-button__small" v-on:click="productPurchase">
                        はい
                    </button>    
                    <button type="submit" class="c-button p-button__small" v-on:click="closeModal">
                        いいえ
                    </button> 
                </div>
            </div>
        </div>
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-url="https://haiki-share.com/haiki-share/public/productDetail/1" v-bind:data-text="tweetMessage" data-show-count="false">Tweet</a>
    </div>
</template>
<script>

export default {
    props:['categories','product','user'],
    data: function() {
        return { 
            saled_flg: this.product.saled_flg,
            user_id: this.product.user_id,
            confirm_mode:'',
            success_message: {
                purchase: '',
                cancel: '',
            },
        }
    },
    methods: {
        //確認モーダル表示
        showModal: function(e){
            if(!this.saled_flg){
                this.confirm_mode = 'purchase';
            } else {
                this.confirm_mode = 'cancel';
            }
        },
        //確認モーダル閉じる
        closeModal: function(e){
            this.confirm_mode = '';
        },
        //商品購入処理
        productPurchase: function(e){
            var self = this;
            this.saled_flg = !this.saled_flg;
            if(this.saled_flg){
                this.user_id = this.user.id;
                this.success_message.cancel = '';
                this.confirm_mode = '',
                this.success_message.purchase = '商品を購入しました';
            }else {
                this.user_id = null
                this.confirm_mode = '',
                this.success_message.cancel = '購入をキャンセルしました';
            }
            axios.post('../productPurchase/' + this.product.id,{
                saled_flg: this.saled_flg, 
                user_id: this.user_id,
                convini_id: this.product.convini_id
            }).then(function(){
            })
        },
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