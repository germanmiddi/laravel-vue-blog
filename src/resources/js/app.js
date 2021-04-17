
require('./bootstrap');

window.Vue = require('vue');

import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
import CKEditor from 'ckeditor4-vue';

// Install BootstrapVue
Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)
Vue.use( CKEditor )

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('categories-component', require('./components/categories/CategoriesComponent.vue').default);
Vue.component('categories-form-component', require('./components/categories/CategoriesFormComponent.vue').default);
Vue.component('categories-edit-component', require('./components/categories/CategoriesEditComponent.vue').default);

Vue.component('post-index-component', require('./components/posts/PostIndexComponent.vue').default);
Vue.component('post-form-component', require('./components/posts/PostFormComponent.vue').default);


const app = new Vue({
    el: '#app',
});
