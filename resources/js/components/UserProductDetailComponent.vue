<template>
    <div>
        <h2 class="c-page__title">{{ product.product_name }}</h2>
        <img class="p-pic" v-bind:src="'storage/' + product.product_pic">
        <div class="p-product__description">
            <p>賞味期限: {{ product.expiration_date| date_time }}</p>
            <p><span>¥</span>{{ product.price | number_format }}</p>
        </div>
        <div class="c-form__button">
            <button type="submit" class="c-button" v-on:click.prevent="productPurchase" v-if="this.saled_flg==true && product.user_id === user.id ">
                購入をキャンセルする
            </button>
            <button type="submit" class="c-button" v-bind:class="{ 'p-button_saled': this.saled_flg }" v-on:click.prevent="productPurchase" v-else>
                購入する
            </button>
        </div>
    </div>
</template>
<script>
export default {
    props:['categories','product','user'],
    data: function() {
        return { 
            saled_flg: this.product.saled_flg,
            user_id: this.product.user_id,
        }
    },
    methods: {
        //プロフィール画面へ遷移
        productPurchase: function(e){
            var self = this;
            // this.saled_flg = true;
            this.saled_flg = !this.saled_flg;
            if(this.saled_flg){
                this.user_id = this.user.id;
            }else {
                this.user_id = null
            }
            axios.post('productPurchase/' + this.product.id,{
                saled_flg: this.saled_flg, 
                user_id: this.user_id,
                convini_id: this.product.convini_id
            }).then(function(){
                console.log(self.saled_flg);
            })
         },
    },
}
</script>