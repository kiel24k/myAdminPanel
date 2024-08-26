import { createWebHistory, createRouter } from "vue-router";
//page
import user_index from "../page/user/Index.vue";
import admin_index from "../page/admin/Chat.vue";
import { useUserStore } from "../stores/userStores";
const routes = [
    {
        path: "/:unauthorized(.*)*",
        name: "401",
        component: () => import("../errors/401.vue"),
    },
    {
        path: "/",
        name: "user_index",
        component: user_index,
    },
    {
        path: "/login",
        name: "login",
        component: () => import("../auth/Login.vue"),
    },
    {
        path: "/signup",
        name: "signup",
        component: () => import("../auth/Signup.vue"),
    },
    {
        path: "/list",
        name: "admin_list",
        component: admin_index,
        meta: {
            requireToken: true,
        },
    },
    {
        path: "/myChat",
        name: "myChat",
        component: () => import("../page/admin/MyChat.vue"),
    },
    {
        path: "/table-sort",
        name: "table-sort",
        component: () => import("../page/admin/TableSort.vue"),
    },
    {
        path: "/permission",
        name: "permssion",
        component: () => import("../page/admin/Permission.vue"),
    },
    {
        path: "/protected",
        component: () => import("../components/ProtectedPage.vue"),
        meta: { requiresAuth: true },
    },
    {
        path: "/login2",
        name: "login2",
        component: () => import("../auth/Login2.vue"),
    },
    {
        path: "/profile2",
        name: 'profile2',
        component: () => import('../auth/Profile2.vue')
    },

    {
        path: "/test",
        name: "test",
        component: () => import("../page/admin/testChat.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        return (
            savedPosition ||
            new Promise((resolve) => {
                setTimeout(() => resolve({ top: 0, behavior: "smooth" }), 1);
            })
        );
        return { top: null, left: null, behavior: null };
    },
});

router.beforeEach((to, from) => {
    const userStore = useUserStore();
    const isAuthenticated = userStore.isAuthenticated;

    if (to.meta.requiresAuth && !isAuthenticated) {
        return {
            name: "login",
        };
    }
    //  else {
    //     console.log("dsd");
        
    // }
    //     const token = localStorage.getItem("token")
    //     if(to.meta.requireToken && !token){
    //         return{
    //             name: "login"
    //         }
    //  }
});

export default router;
