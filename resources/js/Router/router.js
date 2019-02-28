import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/login/Login'
import Signup from '../components/login/SignUp'
import Logout from '../components/login/Logout'

import Forum from '../components/Forum'




const routes = [
    { path: '/login', component: Login },
    { path: '/signup', component: Signup },
    { path: '/forum', component: Forum, name:'forum' },
    { path: '/logout', component: Logout},
  ]


const router = new VueRouter({
routes, // short for `routes: routes`,
mode: 'history',
})


export default router
