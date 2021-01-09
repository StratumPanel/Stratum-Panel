/* Layouts */
import DashboardBase from '@/layouts/dashboard/DashboardBase.vue'

/* Views */
import test from '@/pages/home/test.vue'

/* Middlewares */
import authMiddleware from '@/plugins/router/middleware/authMiddleware'

export default {
    path: '/',
    component: DashboardBase,
    children: [
        {
            path: '',
            name: 'Dashboard',
            component: test,
            beforeEnter: authMiddleware
        },
    ],
}
