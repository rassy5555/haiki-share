<template>
    <div>
        <div class="p-button__wrapper">
            <button type="submit" class="c-button p-button__flex" v-on:click="profileEdit">
                プロフィール編集
            </button>    
            <button type="submit" class="c-button p-button__flex" v-on:click="productRegister">
                出品する
            </button> 
        </div>
        <h3 class="c-page__subtitle">出品した商品一覧<label><a class="c-more" v-bind:href="'listingList/' + convini_id">全件表示</a></label></h3>
        <p class="p-message_no-product" v-show="listing_list.length==0">対象商品は現在ありません</p>
        <ul class="c-itemlist">
            <li class="c-card" v-for="product in listing_list">
                <img class="p-pic__card" v-bind:src="'../storage/' + product.product_pic"  alt="" width="300" height="200">
                <label class="p-saled" v-if="product.saled_flg==true">購入済</label>
                <dt class="c-card__description p-card__name">{{ product.product_name }}</dt>
                <dd class="c-card__description">賞味期限: {{ product.expiration_date| date_time }}</dd>
                <dd class="c-card__description p-card__price"><span>¥</span>{{ product.price | number_format }}</dd>
                <button class="c-button p-button__small" v-on:click="productDetail(product.id)">
                    詳細をみる
                </button>
                <button type="submit" class="c-button p-button__small" v-on:click="productEdit(product.id)"  v-if="product.saled_flg == false">
                    編集する
                </button>
            </li>
        </ul>
        <h3　class="c-page__subtitle">購入済商品一覧<label><a class="c-more" v-bind:href="'saledList/' + convini_id">全件表示</a></label></h3>
        <p class="p-message_no-product" v-show="saled_list.length==0">対象商品は現在ありません</p>
        <ul class="c-itemlist">
            <li class="c-card" v-for="product in saled_list">
                    <img class="p-pic__card" v-bind:src="'../storage/' + product.product_pic"  alt="" width="300" height="200">
                    <dt class="c-card__description p-card__name">{{ product.product_name }}</dt>
                    <dd class="c-card__description">賞味期限: {{ product.expiration_date| date_time }}</dd>
                    <dd class="c-card__description p-card__price"><span>¥</span>{{ product.price | number_format }}</dd>
                    <button class="c-button p-button__small" v-on:click="productDetail(product.id)">
                        詳細をみる
                    </button>
            </li>
        </ul>
    </div>
</template>
<script>
    export default {
        props:['convini_id','listing_list','saled_list'],
        data: function() {
            return { 
            }
        },
        methods: {
            //プロフィール画面へ遷移
            profileEdit: function(e){
                location.href = 'profileEdit';
            },
            //商品登録画面へ遷移
            productRegister: function(e){
                location.href = 'productRegister';
            },
            //商品詳細画面へ遷移
            productDetail: function(id){
                location.href = 'productDetail/' + id;
            },
            //商品編集画面へ遷移
            productEdit: function(id){
                location.href = 'productEdit/' + id;
            },
        },
    }
</script>
