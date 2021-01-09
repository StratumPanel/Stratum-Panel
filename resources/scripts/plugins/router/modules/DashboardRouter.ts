/* Layouts */
import DashboardBase from '@/layouts/dashboard/DashboardBase.vue'

/* Views */
import Index from '@/pages/home/Index.vue'

/* Middlewares */
import authMiddleware from '@/plugins/router/middleware/authMiddleware'

export default {
    path: '/',
    component: DashboardBase,
    children: [
        {
            path: '',
            name: 'Dashboard',
            component: Index,
            beforeEnter: authMiddleware
        },
    ],
}
