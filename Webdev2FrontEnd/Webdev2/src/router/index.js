import { createRouter, createWebHistory } from 'vue-router'

import MotorcycleList from '../components/MotorcycleList.vue';
import CreateMotorcycle from '../components/admin/createMotorcycle.vue';
import MotorcycleOverview from '../components/admin/motorcycleOverview.vue';
import EditMotorcycle from '../components/admin/editMotorcycle.vue';
import AdminLogin from '../components/admin/adminLogin.vue';
import ProcessOrder from '../components/ProcessOrder.vue';


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/',  name: 'home', component: MotorcycleList },
    { path: '/createMotorcycle',  name: 'createMotorcycle', component: CreateMotorcycle },
    { path: '/motorcycleOverview',  name: 'motorcycleOverview', component: MotorcycleOverview },
    { path: '/adminLogin',  name: 'adminLogin', component: AdminLogin },
    { path: '/editMotorcycle/:id', component: EditMotorcycle, props: true  },
    { path: '/ProcessOrder/:id', component: ProcessOrder, props: true  }
  ]
})

export default router