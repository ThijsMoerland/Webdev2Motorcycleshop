import { createRouter, createWebHistory } from 'vue-router'

import StockList from '../components/StockList.vue';
import About from '../components/About.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/',  name: 'home', component: StockList },
    { path: '/about',  name: 'aboutpage', component: About },
  ]
})

export default router
