/* Layouts */
import LoginBase from '@client/layouts/auth/LoginBase.vue'

/* Middlewares */
import loginMiddleware from '@client/router/middleware/loginMiddleware'

export default {
    path: '/auth/login/',
    component: LoginBase,
    children: [
        {
            path: '',
            name: 'Login',
            component: () => import('@client/pages/auth/LoginForm.vue'),
            beforeEnter: loginMiddleware
        },
    ],
}
