import { createRouter, createWebHistory } from 'vue-router'

import MotorcycleList from '../components/MotorcycleList.vue';
import About from '../components/About.vue';
import CreateMotorcycle from '../components/admin/createMotorcycle.vue';
import MotorcycleOverview from '../components/admin/motorcycleOverview.vue';
import EditMotorcycle from '../components/admin/editMotorcycle.vue';


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/',  name: 'home', component: MotorcycleList },
    { path: '/about',  name: 'aboutpage', component: About },
    { path: '/createMotorcycle',  name: 'createMotorcycle', component: CreateMotorcycle },
    { path: '/motorcycleOverview',  name: 'motorcycleOverview', component: MotorcycleOverview },
    { path: '/editMotorcycle/:id', component: EditMotorcycle, props: true  }
  ]
})

export default router