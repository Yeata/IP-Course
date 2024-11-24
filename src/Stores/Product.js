import { ref, computed } from "vue";
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
        getCategoriesByGroup: (state) => {
            return (groupName) =>
                state.categories.filter((category) => category.group === groupName);
        },
        getPromotionsByGroup: (state) => {
            return (groupName) =>
                state.promotions.filter((promotion) => promotion.group === groupName);
        },
        getProductsByGroup: (state) => {
            return (groupName) =>
                state.products.filter((product) => product.group === groupName);
        },
    },
    actions: {
        fetchCategories() {
            axios
                .get("http://localhost:3000/api/categories")
                .then((result) => console.log(result.data))
                .catch((error) => console.error("Error fetching categories:", error));
        },
        fetchPromotions() {
            axios
                .get("http://localhost:3000/api/Promotions")
                .then((result) => console.log(result.data))
                .catch((error) => console.error("Error fetching promotions:", error));
        },

        fetchProducts() {
            axios
                .get("http://localhost:3000/api/products")
                .then((result) => console.log(result.data))
                .catch((error) => console.error("Error fetching products:", error));
        },
        fetchGroups() {
            axios
                .get("http://localhost:3000/api/products")
                .then((result) => console.log(result.data))
                .catch((error) => console.error("Error fetching group:", error));
        },
    },
});


