"use strict";
/*global require*/
/*global window*/
/*global Vue*/


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
import 'vue2-dropzone/dist/vue2Dropzone.css';

Vue.use(VueRouter);
import { Navbar } from 'bootstrap-vue/es/components';
Vue.use(Navbar);
import HomeComponent from './components/HomeComponent';
import SignInComponent from './components/SignInComponent';
import VerificationComponent from './components/VerificationComponent';
import Dashboard from './components/Dashboard';
import CompanyQuestionComponent from './components/CompanyQuestionComponent';
import DownloadpdfComponent from './components/DownloadpdfComponent';
import UploadpdfComponent from './components/UploadpdfComponent';
import App from './app';
import UserCartComponent from './components/user/UserCartComponent';
import UserOrderHistoryComponent from './components/user/OrderHisoryComponent';
//// Admin Dashboard Routes //////
import AdminOrdersComponent from './components/admin/AdminOrdersComponent';
import AdminUsersComponent from './components/admin/AdminUsersComponent';
import * as UserConstants  from './UserConstant';




Vue.component('signin-component', require('./components/SignInComponent.vue'));


//////////// Checking for Rutes Authentication
function checkAuthentication(path , type)
{
    if(type===UserConstants.TYPE_NEW_USER) {
        return '/verifyPin'===path?'':'/verifyPin';
    }
    else if(type===UserConstants.TYPE_ACTIVE_USER)
    {
        if(path==='/userCart')
            return '/userCart'===path?'':'/userCart';
        else
            return '/userOrderHistory'===path?'':'/userOrderHistory';
    }
    else if(type===UserConstants.TYPE_ADMIN) {
        if(path==='/adminOrders')
            return '/adminOrders' === path ? '' : '/adminOrders';
        else
            return '/adminUsers' === path ? '' : '/adminUsers';
    }
    else if(type===UserConstants.TYPE_PENDING_APPROVAL)
        return '/dashboard'===path?'':'/dashboard';
    else
        next();
}

function routeRenderer(route,next)
{
    if (route == '') {
        next();
    }
    else {
        next(route);
    }
}

const routes=[
    {
        path:'/',
        component:HomeComponent,
        beforeEnter (to, from, next) {
            if (localStorage.getItem("apiToken")) {
                next(checkAuthentication('/',localStorage.getItem("type")));
            } else {
                next();
            }
        }
    },
    {
        path:'/requestPin',
        component:SignInComponent,
        name:'requestPin',
        beforeEnter (to, from, next) {
            if (localStorage.getItem("apiToken")) {
                next(checkAuthentication('/requestPin',localStorage.getItem("type")));
            } else {
                next()
            }
        }
    },
    {
        path:'/verifyPin',
        component:VerificationComponent,
        name:'verifyPin',
        props:true,
        beforeEnter (to, from, next) {
            if (localStorage.getItem("apiToken")) {
                next(checkAuthentication('/verifyPin',localStorage.getItem("type")));
            } else {
                next()
            }
        }
    },
    {
        path:'/dashboard',
        component:Dashboard,
        name:'dashboard',
        beforeEnter (to, from, next) {
            if (localStorage.getItem("apiToken")) {
                let value=checkAuthentication('/dashboard',localStorage.getItem("type"));
                routeRenderer(value,next);
            } else {
                next('/requestPin')
            }
        }
    },
    {
        path:'/companyQuestion',
        component:CompanyQuestionComponent,
        name:'companyQuestion',
        props:true,
        beforeEnter (to, from, next) {
            if (localStorage.getItem("apiToken") && localStorage.getItem("type")===UserConstants.TYPE_NEW_USER) {
                next();
            } else {
                next('/requestPin')
            }
        }
    },
    {
        path:'/downloadPdf',
        component:DownloadpdfComponent,
        name:'downloadPdf',
        props:true,
        beforeEnter (to, from, next) {
            if (localStorage.getItem("apiToken") && localStorage.getItem("type")===UserConstants.TYPE_NEW_USER) {
                next();
            } else {
                next('/requestPin')
            }
        }
    },
    {
        path:'/uploadPdf',
        component:UploadpdfComponent,
        name:'uploadPdf',
        beforeEnter (to, from, next) {
            if (localStorage.getItem("apiToken") && localStorage.getItem("type")===UserConstants.TYPE_NEW_USER) {
                next();
            } else {
                next('/requestPin')
            }
        }
    },
    {
        path:'/userCart',
        component:UserCartComponent,
        name:'userCart',
        props:true,
        beforeEnter (to, from, next) {
            if (localStorage.getItem("apiToken")) {
                let value=checkAuthentication('/userCart',localStorage.getItem("type"));
                routeRenderer(value,next);
            } else {
                next('/requestPin')
            }
        }
    },
    {
        path:'/userOrderHistory',
        component:UserOrderHistoryComponent,
        name:'userOrderHistory',
        props:true,
        beforeEnter (to, from, next) {
            if (localStorage.getItem("apiToken") ) {
                let value=checkAuthentication('/userOrderHistory',localStorage.getItem("type"));
                routeRenderer(value,next);
            } else {
                next('/requestPin')
            }
        }
    },
    {
        path:'/adminOrders',
        component:AdminOrdersComponent,
        name:'adminOrders',
        props:true,
        beforeEnter (to, from, next) {
            if (localStorage.getItem("apiToken")) {
                let value=checkAuthentication('/adminOrders',localStorage.getItem("type"));
                routeRenderer(value,next);
            } else {
                next('/requestPin')
            }
        }
    },
    {
        path:'/adminUsers',
        component:AdminUsersComponent,
        name:'adminUsers',
        props:true,
        beforeEnter (to, from, next) {
            if (localStorage.getItem("apiToken")) {
                let value=checkAuthentication('/adminUsers',localStorage.getItem("type"));
                routeRenderer(value,next);
            } else {
                next('/requestPin')
            }
        }
    }

];


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router=new VueRouter({
    routes,
    mode:'history',
    hashbang:false,
    history:true

});
const repData=null;
const app = new Vue({
    el: '#app',
    router,
    components:{App},
});
