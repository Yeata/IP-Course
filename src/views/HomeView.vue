<template>
    <div id="app">
      <!-- Category Feature Menu -->
      <h2>{{ categoryTitle }}</h2>
      <Menu
        :type="CategoryProduct" 
        @changeBar="updateActiveTab" 
        @menu-selected="handleMenuSelection" 
      />
      <CategoryComponent />
  
      <PromotionComponent />
  
      <!-- Popular Product Menu -->
      <h2>{{ popularTitle }}</h2>
      <Menu
        :type="PopularProducts"  
        @changeBar="updateActiveTab"
        @menu-selected="handleMenuSelection" 
      />
      <Product />
      <router-view />
    </div>
  </template>
  
  <script>
 
  import CategoryComponent from '@/components/CategoryComponent.vue';
  import PromotionComponent from '@/components/PromotionComponent.vue';
  import Product from '@/components/Product.vue';
  import { useProductStore } from "@/Stores/Product";
  import { mapState } from "pinia";
import Menu from '@/components/Menu.vue';
  
  export default {
    name: "App",
    components: {
      Menu,
      CategoryComponent,
      PromotionComponent,
      Product,
    },
  
    data() {
      return {
        
        categoryTitle: "Featured Categories",  
        popularTitle: "Popular Products",     
        CategoryProduct: "Feature Categories",  
        PopularProducts: "Popular Product",     
        currentTabs: {
          category: "ALL", // Initial value for the category selection
          popular: "ALL",  // Initial value for popular category selection
        },
      };
    },
  
    methods: {
      updateActiveTab({ type, tab }) {
        const key = type.toLowerCase().replace(" ", "");
        if (this.currentTabs[key] !== undefined) {
          this.currentTabs[key] = tab;
        }
      },
  
      handleMenuSelection(item) {
        console.log("Menu selected:", item);
        if (item === "ALL") {
          // Handle "ALL" selection if needed
          this.currentTabs.popular = "ALL";
        } else {
          // Handle selection of categories or other items
          this.currentTabs.popular = item;
        }
      },
    },
  
    mounted() {
      const productStore = useProductStore();
      productStore.fetchCategories();
      productStore.fetchPromotions();
      productStore.fetchGroups();
      productStore.fetchProducts();
    },
  
    computed: {
      ...mapState(useProductStore, {
        categories: (state) =>
          state.getCategoriesByGroup(this.currentTabs.category),
        promotions: "promotions",
        allProducts: "products",
      }),
  
      filteredProducts() {
        const productStore = useProductStore();
        if (this.currentTabs.popular === "ALL") {
          return productStore.getPopularProducts();
        }
        return productStore.getProductsByGroup(this.currentTabs.popular);
      },
    },
  };
  </script>
  