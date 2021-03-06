/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//導覽
Vue.component('menu-component', require('./components/menu.vue').default);

//家
Vue.component('home-component', require('./components/home.vue').default);

//計畫
Vue.component('plan-component', require('./components/plan/index.vue').default);

//計畫創造
Vue.component('plan-create-component', require('./components/plan/create.vue').default);

//產品
Vue.component('product-component',require('./components/product/index.vue').default);

//計畫創造
Vue.component('product-create-component', require('./components/product/create.vue').default);

//客戶
Vue.component('custom-component',require('./components/custom/index.vue').default);

//客戶創造
Vue.component('custom-create-component', require('./components/custom/create.vue').default);

//家人
Vue.component('family-component',require('./components/family/index.vue').default);

//家人創造
Vue.component('family-create-component', require('./components/family/create.vue').default);

//訂單
Vue.component('order-component',require('./components/order/index.vue').default);

//訂單創造
Vue.component('order-create-component', require('./components/order/create.vue').default);

//訂單項目
Vue.component('orderlist-component',require('./components/orderlist/index.vue').default);

//訂單項目創造
Vue.component('orderlist-create-component', require('./components/orderlist/create.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
