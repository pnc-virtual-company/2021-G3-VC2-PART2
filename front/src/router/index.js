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
    component: () => import('@/components/nav/Navigation.vue')
  },
  

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
  {
    path: "/unauthorized",
    name: "NotAuthorized",
    component: () => import('@/components/nav/NotAuthorized.vue')
  }
]
let authenticationGuard = (to, from, next) => {
  if (to.path === "/user" || to.path ==="/student") {
    let isLoggedIn = localStorage.getItem("user") !== null &&  localStorage.getItem("user") !== "";

    if (isLoggedIn) {
      next();
    } else {
      next("/unauthorized");
    }
  } else {
    next();
  }
};

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach(authenticationGuard);
export default router
