<template>
    <div>
        <button type="submit" class="c-button" v-on:click="profileEdit">
            プロフィール編集
        </button>    
        <button type="submit" class="c-button" v-on:click="productRegister">
            出品する
        </button> 
        <ul class="c-itemlist">
            <li class="c-card" v-for="product in listing_list">
                    <img class="p-pic__card" v-bind:src="'/storage/' + product.product_pic"  alt="" width="300" height="200">
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
        <ul class="c-itemlist">
            <li class="c-card" v-for="product in saled_list">
                    <img class="p-pic__card" v-bind:src="'/storage/' + product.product_pic"  alt="" width="300" height="200">
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
    import Paginate from 'vuejs-paginate'
    export default {
        props:['convini_id','listing_list','saled_list'],
        data: function() {
            return { 
            }
        },
        methods: {
            //プロフィール画面へ遷移
            profileEdit: function(e){
                location.href = '../../convini/profileEdit/';
            },
            //商品登録画面へ遷移
            productRegister: function(e){
                location.href = '../../convini/productRegister/';
            },
            //商品詳細画面へ遷移
            productDetail: function(id){
                location.href = '../../convini/productDetail/' + id;
            },
            //商品編集画面へ遷移
            productEdit: function(id){
                location.href = '../../convini/productEdit/' + id;
            },
        },
    }
</script>