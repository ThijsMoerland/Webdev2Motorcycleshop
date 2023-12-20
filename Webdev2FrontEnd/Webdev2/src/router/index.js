import { createRouter, createWebHistory } from 'vue-router'

import MotorcycleList from '../components/MotorcycleList.vue';
import About from '../components/About.vue';
import CreateMotorcycle from '../components//admin/createMotorcycle.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/',  name: 'home', component: MotorcycleList },
    { path: '/about',  name: 'aboutpage', component: About },
    { path: '/createMotorcycle',  name: 'createMotorcycle', component: CreateMotorcycle },
  ]
})

export default router