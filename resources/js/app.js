/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// require("@babel/polyfill");
// require('babel-polyfill');
// import '@babel/polyfill';
require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
//ユーザー用コンポーネント
Vue.component('user_home-component', require('./components/user/UserHomeComponent.vue').default); //マイページ
Vue.component('user_login-component', require('./components/user/UserLoginComponent.vue').default);　//ログイン
Vue.component('user_register-component', require('./components/user/UserRegisterComponent.vue').default); //新規登録
Vue.component('user_profile-component', require('./components/user/UserProfileComponent.vue').default); //プロフィール編集
Vue.component('user_product_list-component', require('./components/user/UserProductListComponent.vue').default);　//商品一覧表示
Vue.component('user_product_detail-component', require('./components/user/UserProductDetailComponent.vue').default);　//商品詳細
Vue.component('user_send_password-component', require('./components/user/UserSendPasswordComponent.vue').default); //パスワードリマインダーメール送信
Vue.component('user_reset_password-component', require('./components/user/UserResetPasswordComponent.vue').default); //パスワードリセット

//コンビニ用コンポーネント
Vue.component('convini_home-component', require('./components/convini/ConviniHomeComponent.vue').default); //マイページ
Vue.component('convini_login-component', require('./components/convini/ConviniLoginComponent.vue').default); //ログイン
Vue.component('convini_register-component', require('./components/convini/ConviniRegisterComponent.vue').default); //新規登録
Vue.component('convini_profile-component', require('./components/convini/ConviniProfileComponent.vue').default); //プロフィール編集
Vue.component('category_register-component', require('./components/convini/CategoryRegisterComponent.vue').default); //カテゴリー登録
Vue.component('product_register-component', require('./components/convini/ProductRegisterComponent.vue').default); //商品登録
Vue.component('product_edit-component', require('./components/convini/ProductEditComponent.vue').default); //商品編集
Vue.component('convini_product_detail-component', require('./components/convini/ConviniProductDetailComponent.vue').default); //商品詳細
Vue.component('convini_product_list-component', require('./components/convini/ConviniProductListComponent.vue').default); //商品一覧表示
Vue.component('listing_list-component', require('./components/convini/ListingListComponent.vue').default); //出品した商品一覧表示
Vue.component('saled_list-component', require('./components/convini/SaledListComponent.vue').default); //購入済商品
Vue.component('convini_send_password-component', require('./components/convini/ConviniSendPasswordComponent.vue').default);　//パスワードリマインダーメール送信
Vue.component('convini_reset_password-component', require('./components/convini/ConviniResetPasswordComponent.vue').default);　//パスワードリセット


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
