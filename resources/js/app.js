require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);

//Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('pagination', require('laravel-vue-pagination'));

import HomeComponent from './components/HomeComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import PeoplesComponent from './components/PeoplesComponent.vue';
import EditComponent from './components/EditComponent.vue';
import App from './components/App'

const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeComponent
    },
    {
        name: 'people',
        path: '/people',
        component: PeoplesComponent
    },
    {
        name: 'create',
        path: '/people/create',
        component: CreateComponent
    },
    {
        name: 'edit',
        path: '/people/edit/:id',
        component: EditComponent
    }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');