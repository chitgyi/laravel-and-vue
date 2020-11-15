import VueRouter from 'vue-router'
import Vue from 'vue'
import Home from './../assets/layouts/Home'
import Login from './../assets/layouts/Login'
import Article from './../assets/layouts/Article'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/home',
        component: Home
    },
    {
        path: '/login',
        component: Login
    },
    {
        path: '/Article',
        component: Article
    }
]

const router = new VueRouter({
    mode: 'hash', // history, hash (default), abstract
    routes
})
export default router

