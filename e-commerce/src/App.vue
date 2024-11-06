<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
   <div id="app" class="container">
    <CategoryComponent />
    <PromotionComponent />
  </div>
  <RouterView />
</template>

<script>
import CategoryComponent from "/home/yeata/IP/IP-Course/e-commerce/src/components/CategoryCoponent.vue";
import PromotionComponent from "/home/yeata/IP/IP-Course/e-commerce/src/components/Promotion.vue";

export default {
  name: "App",
  components: {
    CategoryComponent,
    PromotionComponent,
  },
};
</script>

<style>
.container {
  display: flex;
  flex-direction: column;
}
</style>
