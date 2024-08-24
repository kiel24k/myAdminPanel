import { createWebHistory, createRouter } from 'vue-router'
//page
import user_index from '../page/user/Index.vue'
import admin_index from '../page/admin/Chat.vue'
const routes = [
    {
        path:'/:unauthorized(.*)*',
        name: '401',
        component: () => import('../errors/401.vue')
    },
    {
        path: '/',
        name: 'user_index',
        component: user_index
    },
    {
        path:'/login',
        name:'login',
        component: () => import ('../auth/Login.vue')
    },
    {
        path:'/signup',
        name:'signup',
        component: () => import ('../auth/Signup.vue')
    },
    {
        path:'/list',
        name: 'admin_list',
        component:admin_index,
        meta: {
            requireToken: true
        }
    },
    {
      path: '/myChat',
      name: 'myChat',
      component: () => import('../page/admin/MyChat.vue')  
    },
  {
    path: '/test',
    name: 'test',
    component: () => import('../page/admin/testChat.vue')
  }

]

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior (to, from, savedPosition) {
        return savedPosition || new Promise ((resolve => {
            setTimeout(() => resolve({top:0, behavior: "smooth"}),1)
        }))
        return {top:null,left:null, behavior: null}
    }
  })

  router.beforeEach((to, from, ) => {
    const token = localStorage.getItem("token")
    if(to.meta.requireToken && !token){
        return{
            name: "login"
        }
 }
})

  export default router;
