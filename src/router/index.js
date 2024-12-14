import { createRouter, createWebHistory } from 'vue-router';
import landing from '../pages/Landing.vue';
import subpage from '../pages/Subpage.vue';
import { useHelpers } from '../composables/useHelpers';

const { url } = useHelpers()

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  
  // scrollBehavior(to, from, savedPosition) {
  //   if (savedPosition) {
  //     return savedPosition
  //   }
  //   else if (to.query.savedPosition) {
  //     return {}
  //   }
  //   else {
  //     return {
  //       el: '#main',
  //       top: 0,
  //       behavior: 'smooth',
  //     }
  //   }
  // },
  routes: [
    {
      path: url(''),
      name: 'landing',
      component: landing
    },
    {
      path: url('/:url'),
      name: 'subpage',
      component: subpage
    }
  ]
})

export default router
