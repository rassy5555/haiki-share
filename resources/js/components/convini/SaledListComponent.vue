<template>
    <div>
        <ul class="c-itemlist">
            <li class="c-card" v-for="product in getItems">
                    <img class="p-pic__card" v-bind:src="'../../storage/' + product.product_pic"  alt="" width="300" height="200">
                    <dt class="c-card__description p-card__name">{{ product.product_name }}</dt>
                    <dd class="c-card__description">賞味期限: {{ product.expiration_date| date_time }}</dd>
                    <dd class="c-card__description p-card__price"><span>¥</span>{{ product.price | number_format }}</dd>
                    <button class="c-button p-button__small" v-on:click="productDetail(product.id)">
                        詳細をみる
                    </button>
            </li>
        </ul>
        <p class="p-message__no-product" v-show="saled_list.length==0">対象商品は現在ありません</p>
        <paginate
            :page-count="getPageCount"
            :page-range="3"
            :margin-pages="2"
            :click-handler="clickCallback"
            :prev-text="'<'"
            :prev-link-class="'p-page__prev'"	
            :next-text="'>'"
            :next-link-class="'p-page__next'"	
            :container-class="'p-pagination'"
            :page-class="'p-page__item'"
            :page-link-class="'p-page__item-link'"
            :hide-prev-next= true>
        </paginate>
    </div>
</template>
<script>
import Paginate from 'vuejs-paginate'
Vue.component('paginate', Paginate)

export default {
    props: ['saled_list'],
    data: function(){
        return{
            items: this.saled_list,
            parPage: 10,//1ページあたりの表示商品数
            currentPage: 1
        }
    },    
    methods: {
        //商品詳細画面へ遷移
        productDetail: function(id){
            location.href = '../productDetail/' + id;
        },
        //現在のページ数を取得（ページネーション用)
        clickCallback: function (pageNum) {
            this.currentPage = Number(pageNum);
        },
    },
    computed: {
        //現在のページに表示する商品を取得
        getItems: function() {
        var current = this.currentPage * this.parPage;
        var start = current - this.parPage;
        return this.items.slice(start, current);
        },
        //トータルページ数を取得
        getPageCount: function() {
        return Math.ceil(this.items.length / this.parPage);
        }
    },
}
</script>