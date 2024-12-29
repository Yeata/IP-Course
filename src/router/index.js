import { createRouter, createWebHistory } from 'vue-router';
import Page from '../views/Page.vue';
import Section from '../views/Section.vue';

const routes = [
  {
    path: "/",
    redirect: "/page/1"
  },
  {
    path: "/page/:pageNumber",
    component: Page,
    children: [
      {
        path: "section/:sectionNumber",
        component: Section,
      }
    ]
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
