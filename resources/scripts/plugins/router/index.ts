/*
 * Router
 * ------------------------
 * 
 * This file contains all the routes for the application.
 * Routes are joined together here from the modules folder.
 */

/* Dependencies */
import Vue from "vue"
import Router from "vue-router"

/* Routes */
import AuthenticationRouter from "@/plugins/router/modules/AuthenticationRouter"
import DashboardRouter from "@/plugins/router/modules/DashboardRouter"

Vue.use(Router);
 
const router = new Router({
    mode: "history",
    base: process.env.BASE_URL,
    routes: [
        AuthenticationRouter,
        DashboardRouter
    ]
});

export default router