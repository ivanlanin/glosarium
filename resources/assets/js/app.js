
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./libraries');
require('./routes');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

// Bootstarap components
Vue.component('alert', require('./components/Bootstrap/alert.vue'));
Vue.component('loader', require('./components/Bootstrap/loader.vue'));

// App components
Vue.component('search', require('./components/App/search.vue'));

/**
 * jQuery handler
 */
$(() => {
	$('a.logout').click(() => {
		$('#logout-form').submit();
		return false;
	});
});