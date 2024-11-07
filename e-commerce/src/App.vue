<script setup>
</script>

<template>
   <div id="app" class="container">
    <CategoryComponent />
    <PromotionComponent />
    <ButtonComponent />
  </div>
</template>

<script>
import ButtonComponent from "./components/ButtonComponent.vue";
import CategoryComponent from "/home/yeata/IP/IP-Course/e-commerce/src/components/CategoryCoponent.vue";
import PromotionComponent from "/home/yeata/IP/IP-Course/e-commerce/src/components/Promotion.vue";

export default {
  name: "App",
  components: {
    CategoryComponent,
    PromotionComponent,ButtonComponent
  },
};
</script>

<style>
.container {
  display: flex;
  flex-direction: column;
}
</style>
