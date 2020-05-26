require('./bootstrap-web');

window.Vue = require('vue');

import store from './store/index.js';

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('products-component', require('@/components/Products/ProductsComponent').default);
Vue.component('cart-component', require('@/components/Cart/Cart').default);
const app = new Vue({
    el: '#app',
    store
});
