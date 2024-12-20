import { defineStore } from "pinia";
import axios from "axios";

export const useProductStore = defineStore("product", {
  state: () => ({
    groups: [],
    promotions: [],
    categories: [],
    products: [],
  }),
  getters: {
    // Get all categories by group name
    getCategoriesByGroup: (state) => {
      return (groupName) =>
        state.categories.filter((category) => category.group === groupName);
    },

    // Get all products by group name
    getProductsByGroup: (state) => {
      return (groupName) =>
        state.products.filter((product) => product.group === groupName);
    },

    // Get all products by a given categoryId
    getProductsByCategory: (state) => {
      return (categoryId) =>
        state.products.filter((product) => product.categoryId === categoryId);
    },

    getPopularProducts: (state) => {
      return state.products.map((product) => {
        let label = null;
    
        if (product.countSold < 5) {
          label = "Hot";
        } else if (product.countSold > 20) {
          label = "Sale";
        } else if (product.promotionAsPercentage > 0) {
          label = `${product.promotionAsPercentage}% Off`;
        }
    
        return {
          ...product,
          label, // Add the label to each product
        };
      });
    },    
  },
  actions: {
    async fetchCategories() {
      try {
        const result = await axios.get("http://localhost:3000/api/categories");
        this.categories = result.data; // Store fetched categories in the state
      } catch (error) {
        console.error("Error fetching categories:", error);
      }
    },
    async fetchPromotions() {
      try {
        const result = await axios.get("http://localhost:3000/api/Promotions");
        this.promotions = result.data;
      } catch (error) {
        console.error("Error fetching promotions:", error);
      }
    },
    async fetchProducts() {
      try {
        const result = await axios.get("http://localhost:3000/api/products");
        this.products = result.data.map((product) => ({
          id: product.id,
          name: product.name,
          price: product.price,
          promotionAsPercentage: product.promotionAsPercentage,
          image: this.parseImage(product.image), 
          rating: parseFloat(product.rating),
          size: product.size,
          instock: parseInt(product.instock),
          quantity: 1,
          group: product.group,
          categoryId: product.categoryId, 
          countSold: product.countSold, 
          sale: product.sale,
          hot: product.hot,
        }));
      } catch (error) {
        console.error("Error fetching products:", error);
      }
    },
    async fetchGroups() {
      try {
        const response = await axios.get("http://localhost:3000/api/groups");
        this.groups = response.data; 
      } catch (error) {
        console.error("Error fetching groups:", error);
      }
    },
    parseImage(imageString) {
      try {
        const images = JSON.parse(imageString);
        return images[0].replace(/\\\\/g, "/");
      } catch (error) {
        console.error("Error parsing image string:", error);
        return "";
      }
    },
  },
});
