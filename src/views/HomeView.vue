<template>
  <div id="home">
    <Header/>
  <MenuItem />
    <showcase/>
    <!-- Home Page Categories -->
    <section>
      <h2>{{ categoryTitle }}</h2>
      <Menu
        :type="CategoryProduct"
        @changeBar="updateActiveTab"
        @menu-selected="handleMenuSelection"
      />
      <CategoryComponent />
    </section>

    <!-- Home Page Promotions -->
    <section>
      <PromotionComponent />
    </section>

    <!-- Home Page Popular Products -->
    <section>
      <h2>{{ popularTitle }}</h2>
      <Menu
        :type="PopularProducts"
        @changeBar="updateActiveTab"
        @menu-selected="handleMenuSelection"
      />
      <Product />
    </section>

    <router-view />
  </div>
</template>

<script>
import MenuItem from '@/components/MenuItem.vue';
import Menu from '@/components/Menu.vue';
import CategoryComponent from '@/components/CategoryComponent.vue';
import PromotionComponent from '@/components/PromotionComponent.vue';
import Product from '@/components/Product.vue';
import { useProductStore } from '@/Stores/Product';
import { mapState } from 'pinia';
import Header from '@/components/Header.vue';
import Showcase from '@/components/Showcase.vue';
export default {
  name: "HomeView",

  components: {
    Showcase,
    Header,
    MenuItem,
    Menu,
    CategoryComponent,
    PromotionComponent,
    Product
    
  },

  data() {
    return {
      categoryTitle: "Explore Categories",
      popularTitle: "Top Products",
      CategoryProduct: "Category List",
      PopularProducts: "Popular Items",
      currentTabs: {
        category: "ALL",
        popular: "ALL",
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
      console.log("Selected:", item);
      this.currentTabs.popular = item === "ALL" ? "ALL" : item;
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
      categories: (state) => state.getCategoriesByGroup(this.currentTabs.category),
      promotions: "promotions",
      allProducts: "products",
    }),

    filteredProducts() {
      const productStore = useProductStore();
      return this.currentTabs.popular === "ALL"
        ? productStore.getPopularProducts()
        : productStore.getProductsByGroup(this.currentTabs.popular);
    },
  },
};
</script>

<style scoped>
/* Add your home view specific styles here */
</style>
