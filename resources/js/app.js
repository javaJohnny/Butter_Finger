
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('searchComponent', require('./components/movies/SearchComponent.vue'));
Vue.component('popularMovie', require('./components/movies/popularMovie.vue'));
Vue.component('upcomingMovie', require('./components/movies/upcomingMovie.vue'));
Vue.component('topratedMovie', require('./components/movies/topratedMovie.vue'));
Vue.component('nowplayingMovie', require('./components/movies/nowplayingMovie.vue'));
Vue.component('showMovie', require('./components/movies/showMovie.vue'));
Vue.component('similarMovie', require('./components/movies/similarMovie.vue'));
Vue.component('youtubeSearch', require('./components/movies/youtube.vue'));
Vue.component('favoriteBtn', require('./components/favoritebtn.vue'));
Vue.component('favoriteShow', require('./components/movies/favoriteShow.vue'));







const app = new Vue({
    el: '#app'
});
