/*
|--------------------------------------------------------------------------
| Auth Middleware
|--------------------------------------------------------------------------
|
| The auth middleware checks with Vuex to see if the user is authenticated.
| Since we will be using it on most of the routes, it's better to
| store the auth state on the client WHILE making periodic checks
| with the server that the user is authenticated.
*/

import { Route } from 'vue-router'
import store from '@/plugins/store'

export default function authMiddleware(this: any, to: Route, from: Route, next: Function) {
    if (store.getters['auth/AuthState']) next()
    else next({ name: 'Login' })
}