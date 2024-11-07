<template>
  <div id="app">
    <CategoryComponent/>
    <PromotionComponent/>
    <router-view />
  </div>
</template>

<script>

import CategoryComponent from './components/CategoryComponent.vue';
import PromotionComponent from './components/PromotionComponent.vue';
export default {
  name: "App",
  components: {
    PromotionComponent,
   CategoryComponent,
   
  },
};
</script>

