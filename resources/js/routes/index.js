import { createRouter, createWebHistory } from 'vue-router';

const routes = [
  {
    path: '/',
    name: 'Inicio',
    component: () => import('../pages/Index.vue'),
  },
  {
    path: '/sobre',
    name: 'Sobre',
    component: () => import('../pages/About/Index.vue'),
  },
];

const router = createRouter({
  history: createWebHistory('site'),
  routes,
});

export default router;