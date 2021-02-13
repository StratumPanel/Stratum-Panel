/*
|--------------------------------------------------------------------------
| Login Middleware
|--------------------------------------------------------------------------
|
| The login middleware is designed specifically for the authentication
| routes. Instead of checking Vuex store to see if the user is authenticated,
| this will actually make a request to the server to check.
|
*/

import store from '@client/store'

import getAccountData from '@client/api/account/getAccountData'

export default function loginMiddleware(this: any, to: any, from: any, next: Function) {
    getAccountData()
        .then(() => {
            store.dispatch('auth/setAuthenticated', '1')

            next({ name: 'Dashboard' })
        })
        .catch(err => {
            next()
        })
}