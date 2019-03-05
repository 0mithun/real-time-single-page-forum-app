import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/login/Login'
import Signup from '../components/login/SignUp'
import Logout from '../components/login/Logout'
import Forum from '../components/forum/Forum'
import Read from '../components/forum/Read'
import AskQuestion from '../components/forum/AskQuestion'
import CreateCategory from '../components/category/CreateCategory'




const routes = [
    { path: '/login', component: Login },
    { path: '/', component: Forum },
    { path: '/signup', component: Signup },
    { path: '/logout', component: Logout},

    { path: '/forum', component: Forum, name:'forum' },
    { path: '/ask', component: AskQuestion, name:'ask' },
    { path: '/question/:slug', component: Read, name:'read' },

    { path: '/category', component: CreateCategory},
  ]
 

const router = new VueRouter({
routes, // short for `routes: routes`,
mode: 'history',
})


export default router
