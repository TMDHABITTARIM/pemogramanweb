import { createRouter, createWebHistory } from "vue-router";

// Define routes
const routes = [
    {
    path: '/',
    name: 'home',
    component: () => import( /* webpackChunkName: "home" */
    '../views/home.vue')
    },
    {
    path: '/percetakan',
    name: 'percetakan.index',
    component: () => import( /* webpackChunkName: "index" */
    '../views/percetakan/index.vue')
    },
    {
    path: '/create',
    name: 'percetakan.create',
    component: () => import( /* webpackChunkName: "create" */
    '../views/percetakan/create.vue')
    },
    {
    path: '/edit/:id',
    name: 'percetakan.edit',
    component: () => import( /* webpackChunkName: "edit" */
    '../views/percetakan/edit.vue')
    },
    {
    path: '/product',
    name: 'product.index',
    component: () => import( /* webpackChunkName: "index" */
    '../views/product/index1.vue')
    },
        {
        path: '/create',
        name: 'product.create',
        component: () => import( /* webpackChunkName: "create" */
        '../views/product/create1.vue')
        },
        {
        path: '/edit/:id',
        name: 'product.edit',
        component: () => import( /* webpackChunkName: "edit" */
        '../views/product/edit1.vue')
        }
];

// Create the router instance
const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
