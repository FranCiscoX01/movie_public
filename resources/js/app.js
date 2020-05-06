
require('./bootstrap');
import Axios from 'axios';
window.Vue = require('vue');

import Antd from 'ant-design-vue';
import 'ant-design-vue/dist/antd.css';
Vue.config.productionTip = false;
Vue.use(Antd);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Inicio
 */
Vue.component('home-component', require('./components/HomeComponent.vue').default);
/**
 * Films
 */
Vue.component('film-component', require('./components/film/FilmComponent.vue').default);
/**
 * Search
 */
Vue.component('search-component', require('./components/search/SearchComponent.vue').default);
Vue.component('search-category-component', require('./components/search/SearchCategoryComponent.vue').default);

const app = new Vue({
    el: '#app'
});
