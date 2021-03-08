import VueRouter from "vue-router";

import Titles from './frontend/Titles'

const routes = [
    {
        path: '/filmes/:channel',
        component: Titles,
        name: 'frontend-movies'
    },
    {
        path: '/series/:channel',
        component: Titles,
        name: 'frontend-series'
    },
];

const router = new VueRouter({
    mode: "history",
    routes
})

export default router;
