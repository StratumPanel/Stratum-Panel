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

import store from "@client/store";
import getAccountData from "@client/api/account/getAccountData";

export default async function loginMiddleware() {
    try {
        const canAccess = await getAccountData();
        if (canAccess) return "/";
    } catch (error) {
        console.log({
            message: "loginMiddleware: User is not authenticated",
            httpCode: error.response.status 
        });
        return true;
    }
}
