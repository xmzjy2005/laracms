
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
//从article复制过来的
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import HdVueForm from 'houdunren-vue-form';
Vue.use(ElementUI);
//url为上传文件处理地址
Vue.use(HdVueForm,{url:'/upload'});




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
