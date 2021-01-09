/* Layouts */
import LoginBase from '@/layouts/auth/LoginBase.vue'

/* Views */
import LoginForm from '@/pages/auth/LoginForm.vue'

/* Middlewares */
import loginMiddleware from '@/plugins/router/middleware/loginMiddleware'

export default {
    path: '/auth/login/',
    component: LoginBase,
    children: [
        {
            path: '',
            name: 'Login',
            component: LoginForm,
            beforeEnter: loginMiddleware
        },
    ],
}
