<template>
    <div>
        <button type="submit" class="c-button" v-on:click="profileEdit">
            プロフィール編集
        </button>    
        <h3 class="c-page-subtitle">購入した商品一覧</h3>
        <p class="p-message__no-product" v-show="purchased_list.length==0">対象商品は現在ありません</p>
        <ul class="c-itemlist">
            <li class="c-card" v-for="product in purchased_list">
                <img class="p-pic__card" v-bind:src="'storage/' + product.product_pic"  alt="" width="300" height="200">
                <dt class="c-card__description p-card__name">{{ product.product_name }}</dt>
                <dd class="c-card__description">賞味期限: {{ product.expiration_date| date_time }}</dd>
                <dd class="c-card__description p-card__price"><span>¥</span>{{ product.price | number_format }}</dd>
                <button class="c-button p-button__small" v-on:click="productDetail(product.id)">
                    詳細をみる
                </button>                
                <button type="submit" class="c-button p-button__small" v-on:click="showModal">
                   キャンセル
                </button>
                <div class="p-modal__cover" v-show='confirm_mode' v-on:click="closeModal">
                </div>
                <div class="l-modal__wrapper p-modal__wrapper">
                    <div class="l-modal__container p-modal__container" v-if="confirm_mode=='cancel'">
                        <p>購入をキャンセルしますか?</p>
                        <div class="p-button__wrapper">
                            <button type="submit" class="c-button p-button__small" v-on:click="productCansell(product.id)">
                                はい
                            </button>    
                            <button type="submit" class="c-button p-button__small" v-on:click="closeModal">
                                いいえ
                            </button> 
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
    export default {
        props:['user_id','purchased_list'],
        data: function() {
            return { 
                confirm_mode:'',
            }
        },
        methods: {
            //プロフィール画面へ遷移
            profileEdit: function(e){
                location.href = 'profileEdit';
            },
            //商品詳細画面へ遷移
            productDetail: function(id){
                location.href = 'productDetail/' + id;
            },
            //確認モーダル表示
            showModal: function(e){
                    this.confirm_mode = 'cancel';
            },
            //確認モーダル閉じる
            closeModal: function(e){
                this.confirm_mode = '';
            },
            //購入をキャンセルする
            productCansell: function(product_id){
                var self = this;
                axios.post('productPurchase/' + product_id,{
                    saled_flg: false, 
                    user_id: this.user_id
                }).then(function(){
                    location.href = "home?&flash_message=cancel"
                })                
            },
        },
    }
</script>
