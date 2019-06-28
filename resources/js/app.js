
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');
var moment = require('moment');
import VueRouter from 'vue-router';
import BootstrapVue from 'bootstrap-vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueSwal from 'vue-swal'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import JsonExcel from 'vue-json-excel'

Vue.use(Vuetify,{
    iconfont: 'md',
    theme: {
        primary: '#1976D2',
  secondary: '#424242',
  accent: '#82B1FF',
  error: '#FF5252',
  info: '#2196F3',
  success: '#4CAF50',
  warning: '#FFC107'
    }
})
Vue.component('downloadExcel', JsonExcel)
Vue.use(VueSwal)
Vue.use(VueAxios, axios)
Vue.use(BootstrapVue)
window.Vue.use(VueRouter);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('table-component', require('./components/tableComponent.vue'));
Vue.component('dashboard-component', require('./components/dashboardComponent.vue'));
Vue.component('chrome-component', require('./components/chromeLatestComponent.vue'));
Vue.component('deals-component', require('./components/dealsComponent.vue'))
Vue.component('detail-component', require('./components/dealsDetailComponent.vue'))

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path:'deals'
        }
    ]
});
const app = new Vue({
    el: '#app',
    router,
    moment: moment
});
