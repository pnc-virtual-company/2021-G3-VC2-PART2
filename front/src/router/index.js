import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)


const routes = [
    {
        path: '/',
        name: 'Login',
        component: () => import('@/components/user/login.vue')
    },

    {
        path: '/navbar',
        name: 'Navbar',
        component: () => import('@/components/nav/Navigation.vue'),
        meta: {
            needLogin: true,
        }
    },


    {
        path: '/user',
        name: 'Users',
        component: () => import('@/components/views/Users.vue'),
        meta: {
            needLogin: true,
            needAdmin: true
        }
    },
    {
        path: '/student',
        name: 'Students',
        component: () => import('@/components/views/Student.vue'),
        meta: {
            needLogin: true,
            needAdmin: true
        }
    },
    {
        path: '/permission',
        name: 'Permission',
        component: () => import('@/components/views/Permission.vue'),
        meta: {
            needLogin: true,
            needAdmin: true
        }
    },
    {
        path: '/discipline',
        name: 'Discipline',
        component: () => import('@/components/views/Discipline.vue'),
        meta: {
            needLogin: true,
            needAdmin: true
        }
    },
    // ============= student details ==================
    {
        path: '/studentDetails',
        name: 'Student Details',
        component: () => import('@/components/views/Detail.vue'),
        meta: {
            needLogin: true,
            needAdmin: true
        }
    },
    {
        path: "/*",
        name: "NotAuthorized",
        component: () => import('@/components/nav/NotAuthorized.vue')
    }
]

let authenticationGuard = (to, from, next) => {
    let needLogin = to.meta.needLogin;
    if (needLogin) {
        if (!localStorage.userId) {
            next("/")
        } else {
            if (to.path === "/") {
                next("/user")
            } else {
                next();
            }
        }
    } else {
        if (localStorage.userId) {
            if (to.path === "/") {
                next("/user");
            }
        }
    }
    next()
}


const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

router.beforeEach(authenticationGuard);
export default router
