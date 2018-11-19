
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/*  import Buefy   */

import Buefy from 'buefy'

Vue.use(Buefy)


import vueResource from 'vue-resource'

Vue.use(vueResource)


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('slug', require('./components/slugWidget.vue'));

Vue.component('stripe', require('./components/stripe.vue'));


const app = new Vue({
    el: '#app'
});
