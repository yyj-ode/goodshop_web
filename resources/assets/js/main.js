// require('!style!css!ratchet-npm/dist/css/ratchet.css');// get ratchet
// require('!style!css!font-awesome/css/font-awesome.css');// get font-awesome
// require('!style!css!animate.css/animate.css');// get animate.css

import Vue from 'vue';
import App from './App.vue';
import VueI18n from 'vue-i18n';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import iView from 'iview';

import 'iview/dist/styles/iview.css';    // 使用 CSS
// require('iview/dist/styles/iview.css');// 使用 CSS

Vue.use(iView);

Vue.use(VueI18n);
Vue.use(VueRouter)
Vue.use(VueResource)

/* eslint-disable no-new */

var router = new VueRouter({
    history: true,
    root: 'dashboard'
})


router.map({
    // '/': {
    //     component: require('./components/Home.vue')
    // },
    // '/posts/': {
    //     name: 'posts',
    //     component: require('./components/Posts.vue')
    // },
    // '/posts/categories/:hashid': {
    //     name: 'postincats',
    //     component: require('./components/Posts.vue')
    // },
    // '/posts/:hashid/edit': {
    //     name: 'editpost',
    //     component: require('./components/Editpost.vue')
    // },
    // '/users': {
    //     component: require('./components/Users.vue')
    // },
    // '/categories': {
    //     component: require('./components/Categories.vue')
    // },
    // '/categories/:hashid/edit': {
    //     name: 'categories',
    //     component: require('./components/Editcategory.vue')
    // },
    // '/profile': {
    //     component: require('./components/Profile.vue')
    // },
})

router.alias({
    // alias can contain dynamic segments
    // the dynamic segment names must match
    '/posts/:hashid': '/posts/:hashid/edit',
    'categories/:hashid': '/categories/:hashid/edit'
})

router.start(App, 'body')
