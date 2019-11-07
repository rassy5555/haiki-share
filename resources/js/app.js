/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

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
Vue.component('user_home-component', require('./components/UserHomeComponent.vue').default);
Vue.component('convini_home-component', require('./components/ConviniHomeComponent.vue').default);
Vue.component('user_login-component', require('./components/UserLoginComponent.vue').default);
Vue.component('convini_login-component', require('./components/ConviniLoginComponent.vue').default);
Vue.component('user_register-component', require('./components/UserRegisterComponent.vue').default);
Vue.component('convini_register-component', require('./components/ConviniRegisterComponent.vue').default);
Vue.component('user_profile-component', require('./components/UserProfileComponent.vue').default);
Vue.component('user_product_list-component', require('./components/UserProductListComponent.vue').default);
Vue.component('convini_profile-component', require('./components/ConviniProfileComponent.vue').default);
Vue.component('product_register-component', require('./components/ProductRegisterComponent.vue').default);
Vue.component('product_edit-component', require('./components/ProductEditComponent.vue').default);
Vue.component('convini_product_detail-component', require('./components/ConviniProductDetailComponent.vue').default);
Vue.component('user_product_detail-component', require('./components/UserProductDetailComponent.vue').default);
Vue.component('listing_list-component', require('./components/ListingListComponent.vue').default);
Vue.component('saled_list-component', require('./components/SaledListComponent.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
