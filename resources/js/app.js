require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

// import HomeComponent from './components/HomeComponent.vue';
// import CreateComponent from './components/CreateComponent.vue';
// import IndexComponent from './components/post/IndexComponent.vue';
// import EditComponent from './components/EditComponent.vue';

import HomeComponent from './components/post/HomeComponent.vue';
import CreateComponent from './components/post/CreateComponent.vue';
import IndexComponent from './components/post/IndexComponent.vue';
import EditComponent from './components/post/EditComponent.vue';

import LivroComponent from './components/livro/LivroComponent.vue';
import CreateLivroComponent from './components/livro/CreateLivroComponent.vue';



const routes = [
  {
      name: 'home',
      path: '/',
      component: HomeComponent
  },
  {
      name: 'create',
      path: '/create',
      component: CreateComponent
  },
  {
      name: 'posts',
      path: '/posts',
      component: IndexComponent
  },
  {
      name: 'edit',
      path: '/edit/:id',
      component: EditComponent
  },
  {
      name: 'livros',
      path: '/livros',
      component: LivroComponent
  },
  {
      name: 'createLivro',
      path: '/createLivro',
      component: CreateLivroComponent
  }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');