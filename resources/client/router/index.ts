/*
 * Router
 * ------------------------
 * 
 * This file contains all the routes for the application.
 * Routes are joined together here from the modules folder.
 */

/* Dependencies */
import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";

/* Routes */
import AuthenticationRouter from "@client/router/modules/AuthenticationRouter"
import DashboardRouter from "@client/router/modules/DashboardRouter"

const routes: Array<RouteRecordRaw> = [
    AuthenticationRouter,
    DashboardRouter,
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router