/* Layouts */
import LoginBase from '@/layouts/auth/LoginBase.vue'

/* Middlewares */
import loginMiddleware from '@/plugins/router/middleware/loginMiddleware'

export default {
    path: '/auth/login/',
    component: LoginBase,
    children: [
        {
            path: '',
            name: 'Login',
            component: () => import('@/pages/auth/LoginForm.vue'),
            beforeEnter: loginMiddleware
        },
    ],
}
