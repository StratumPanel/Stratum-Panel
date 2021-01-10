/* Layouts */
import DashboardBase from '@/layouts/dashboard/DashboardBase.vue'

/* Middlewares */
import authMiddleware from '@/plugins/router/middleware/authMiddleware'

export default {
    path: '/',
    component: DashboardBase,
    children: [
        {
            path: '',
            name: 'Dashboard',
            component: () => import('@/pages/home/Index.vue'),
            beforeEnter: authMiddleware
        },
        {
            path: 'account',
            name: 'My Account',
            component: () => import('@/pages/account/Index.vue'),
            beforeEnter: authMiddleware
        },
    ],
}
