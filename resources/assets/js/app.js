
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

var Vue = require('vue');
var VueRouter = require('vue-router').default;
Vue.use(VueRouter);

/*import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);*/ 


import Dnevnik from './components/DnevnikComponent.vue';
import DayComponent from './components/dnevnik/DayComponent.vue';
import Health from './components/dnevnik/HealthComponent.vue';
import Insert from './components/dnevnik/InsertComponent.vue';



const router = new VueRouter({
    mode: 'history',
    routes: [
        
        {
            path: '/dnevnik',
            name: 'dnevnik',
            component: Dnevnik
        },
        {
            path: '/dnevnik/:date',
            name: 'day',
            component: DayComponent
        },
        {
            path: '/dnevnik/:day/health',
            name: 'health',
            component: Health
        },
        {
            path: '/dnevnik/:day/insert',
            name: 'insert',
            component: Insert
        },
        
        
    ]
});



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('dnevnik', require('./components/DnevnikComponent.vue'));
//Vue.component('test', require('./components/TestComponent.vue'));


new Vue({
  el: '#app',
 // components: { Dnevnik },
  router: router
})