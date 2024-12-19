import { createRouter, createWebHistory } from 'vue-router';
import HomePage from '@/views/HomePage.vue';
import Page1 from '@/views/Page1.vue';
import Page2 from '@/views/Page2.vue';
import Page3 from '@/views/Page3.vue';
import Section1Page1 from '@/views/Section1_page1.vue';
import Section2_page2 from '@/views/Section2_page1.vue';
// import Section2Page1 from '@/views/Section2_page1.vue';

const routes = [
  {
    path: '/',
    component: HomePage,
    redirect: '/Page1',
    children: [
      {
        path: 'Page1',
        component: Page1,
        children: [
          {
            path: 'section1',
            component: Section1Page1,
            name: 'Section1Page1',
          },
          {
           path: 'section2',
          component: Section1Page1,
            name: 'Section1Page1',
          },
        ],
      },
      {
        path: 'Page2',
        component: Page2,
        name: 'Page2',
      },
      {
        path: 'Page3',
        component: Page3,
        name: 'Page3',
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

export default router;
