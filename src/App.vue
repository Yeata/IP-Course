

<template>
   <div id="app" class="container">
    <CategoryComponent />
    <PromotionComponent />
    <ButtonComponent />
  </div>
</template>

<script>

import CategoryComponent from "./src/components/CategoryComponent.vue";
import PromotionComponent from "./src/components/Promotion.vue";

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
