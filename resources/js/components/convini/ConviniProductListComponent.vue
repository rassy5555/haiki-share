<template>
    <div>
        <div class="p-filter__wrapper">
            <select id="prefectures" class="p-filter__item" type="text" name="prefectures" v-model="selectPrefecture">
                <option selected v-bind:value="0">都道府県　未選択</option>
                <option v-for="(prefecture,index) in prefectures" v-bind:value="Number(index)" v-text="prefecture"></option>
            </select> 
            <select id="category" class="p-filter__item" type="text" v-model="selectCategory" >
                <option selected v-bind:value="0">カテゴリ　未選択</option>
                <option v-for="(category,index) in categories" v-bind:value="category.id">{{ category.category_name }}</option>
            </select>
            <label class="p-filter__item"><input id="price" type="number" v-model:value="budget" style="width:100px">円以下の商品</label>
            <label class="p-filter__item"><input type="checkbox" v-model="showExpiration">賞味期限以内のもの</label>
        </div>
        <ul class="c-itemlist">
            <li class="c-card" v-for="product in getItems">
                    <img class="p-pic__card" v-bind:src="'../storage/' + product.product_pic"  alt="" width="300" height="200">
                    <label class="p-saled" v-if="product.saled_flg==true">購入済</label>
                    <dt class="c-card__description p-card__name">{{ product.product_name }}</dt>
                    <dd class="c-card__description">賞味期限: {{ product.expiration_date| date_time }}</dd>
                    <dd class="c-card__description p-card__price"><span>¥</span>{{ product.price | number_format }}</dd>
                    <button class="c-button p-button__small" v-on:click="productDetail(product.id)">
                        詳細をみる
                    </button>
            </li>
        </ul>
        <p class="p-message_no-product" v-show="filterdList.length==0">対象商品は現在ありません</p>
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
import prefectures_data from '../../master/prefectures'
import Paginate from 'vuejs-paginate'
Vue.component('paginate', Paginate)
const moment = require('moment');

export default {
    props: ['categories','product_list'],
    data: function(){
        return{
            prefectures: prefectures_data,
            currentTime: new Date(),
            budget: 10000,
            showExpiration: false,
            selectPrefecture:0,
            selectCategory:0,
            parPage: 10,//1ページあたりの表示商品数
            currentPage: 1
        }
    },    
    methods: {
        //商品詳細画面へ遷移
        productDetail: function(id){
            location.href = 'productDetail/' + id;
        },
        //現在のページ数を取得（ページネーション用)
        clickCallback: function (pageNum) {
            this.currentPage = Number(pageNum);
        },
    },
    computed: {
        //絞り込み
        filterdList: function() {
            var newList = [];
            var i = 0;
            for (var i=0; i<this.product_list.length; i++){
                var isShow = true;
                //賞味期限以内の商品だけ表示
                if (this.showExpiration && moment(this.product_list[i].expiration_date).format('YY/MM/DD HH:mm') < moment(this.currentTime).format('YY/MM/DD HH:mm')){
                    isShow = false;
                }
                //カテゴリが選択されている場合、該当カテゴリの商品のみ表示
                if (this.selectCategory != 0 && this.selectCategory != this.product_list[i].category_id){
                    isShow = false;
                }
                //入力金額以下の商品のみ表示
                if (this.product_list[i].price > this.budget){
                    isShow = false;
                }
                //都道府県が選択されている場合その都道府県にあるコンビニの商品のみ表示
                if (this.selectPrefecture != 0 && this.selectPrefecture != this.product_list[i].prefectures){
                    console.log(this.selectPrefecture);
                    console.log(this.product_list[i].prefecture);
                    isShow = false;
                }
                if (isShow) {
                    newList.push(this.product_list[i]);
                }
            }
            return newList;
        },
        //現在のページに表示する商品を取得
        getItems: function() {
            var current = this.currentPage * this.parPage;
            var start = current - this.parPage;
            //絞り込んだ商品を数ページに分ける
            return this.filterdList.slice(start, current);
        },
        //トータルページ数を取得
        getPageCount: function() {
            return Math.ceil(this.filterdList.length / this.parPage);
        }
    },
}
</script>