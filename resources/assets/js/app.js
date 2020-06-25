
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('locations-table', require('./components/LocationsTable.vue'));

// ITems
Vue.component('items-table', require('./components/items.vue'));
Vue.component('categories-table', require('./components/categories.vue'));

new Vue({el: '#app-container'});
