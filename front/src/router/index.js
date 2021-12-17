import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path:'/',
    name:'Login',
    component: () => import('@/components/user/login.vue')
  },
  {
    path:'/navbar',
    name:'Navbar',
    component: () => import('@/components/nav/Navbar.vue')
  }
  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
