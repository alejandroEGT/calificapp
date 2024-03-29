
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import routes from './rutas';
Vue.router = new VueRouter({ routes: routes});
let AppLayout= require('./components/ExampleComponent');
//Axios
import axios from 'axios'
import VueAxios from 'vue-axios'
//vuetify
import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader
import Vuetify from 'vuetify'
import 'babel-polyfill'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueRouter);
Vue.use(Vuetify);
//const router = new VueRouter({ mode: 'history', routes: routes})

Vue.use(VueAxios, axios);
Vue.use(require('@websanova/vue-auth'), {
   auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
   http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
   router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
    rolesVar: 'type',
	loginData: {url: 'api/auth/login'},
	logoutData: {url: 'api/auth/logout'},
    fetchData: {url: 'api/auth/user'},
    refreshData: {enabled: false},
});

AppLayout.router = Vue.router;

new Vue(AppLayout).$mount('#app');
