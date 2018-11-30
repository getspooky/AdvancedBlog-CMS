
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue);

/*  import Buefy   */

import Buefy from 'buefy'

Vue.use(Buefy)


import vueResource from 'vue-resource'

Vue.use(vueResource)


Vue.component('slug', require('./components/slugWidget.vue'));

Vue.component('stripe', require('./components/stripe.vue'));

const app = new Vue({
    el: '#app'
});
