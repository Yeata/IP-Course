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
import { useProductStore } from "./Stores/Product";
import { mapState } from "pinia";

export default {
  name: "App",
  components: {
    PromotionComponent,
   CategoryComponent,
  },


data() {
    return {
      currentGroupname: "Group A",
    };
  },

  methods: {},

  mounted() {
    const productStore = useProductStore();
    productStore.fetchCategories();
    productStore.fetchPromotions();
    productStore.fetchGroup();
    productStore.fetchProducts();
  },

  computed: {
    // Map state and getters from the Pinia store
    ...mapState(useProductStore, {

      // Map the getter getPopularPRoduct to popularProducts
      popularProducts: "getPopularProduct",

      // Dynamically call getCategoriesByGroup with currentGroupName
      categories(store) {
        return store.getCategoriesByGroup(this.currentGroupname);
      },

      // Dynamically call getProductsByGroup with currentGroupName
      productsByGroup(store) {
        return store.getProductsByGroup(this.currentGroupname);
      },

      // Dynamically call getProductsByCategory
      getProductsByCategory(store){
        return store.getProductsByCategory;
      },

      // Get all products directly from the state
      allProducts(store) {
        return store.products;
      },

  
      promotions(store) {
        return store.promotions;
      },
    }),
  },
};

</script>

