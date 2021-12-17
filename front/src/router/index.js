import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


const routes = [

{
  path: '/user',
  name: 'Users',
  component: () => import('@/components/views/Users.vue')
},
{
  path: '/student',
  name: 'Students',
  component: () => import('@/components/views/Student.vue')
},
{
  path: '/permission',
  name: 'Permission',
  component: () => import('@/components/views/Permission.vue')
},
{
  path: '/discipline',
  name: 'Discipline',
  component: () => import('@/components/views/Discipline.vue')
},
]


const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
