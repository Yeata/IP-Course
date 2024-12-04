<template>
  <div class="category-component">
    <div v-for="category in categories" :key="category.id" class="category-item" :style="{ backgroundColor: category.color }">
      <img :src="'http://localhost:3000/' + category.image" :alt="category.name" />
      <p>{{ category.name }}</p>
      <span>{{ category.productCount }} items</span>
    </div>
  </div>
</template>

<script>
import { useProductStore } from "@/Stores/Product";
import { computed } from "vue";

export default {
  name: "CategoryComponent",
  setup() {
    const productStore = useProductStore();

    // Dynamically use the store's data
    const categories = computed(() => productStore.categories);

    return {
      categories,
    };
  },
};
</script>

  
  <style scoped>
  .category-component {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); 
    gap: 15px;
    padding: 30px;
    border-radius: 8px;
  }
  
  .category-item {
    border-radius: 12px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    transition: transform 0.2s, box-shadow 0.2s;
    font-size: 12px;
  }
  
  .category-item:hover {
    transform: scale(1.05); 
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
  }
  
  .category-item img {
    width: 100px; 
    height: 100px;
    object-fit: cover;
    border-radius: 50%; 
    margin-bottom: 10px;
  }
  
  .category-item p {
    font-size: 14px;
    font-weight: 500;
    color: #333;
  }
  
  .category-item span {
    font-size: 10px;
    color: #777;
  }
  
  @media (max-width: 1024px) {
    .category-component {
      grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); /* Smaller width for tablets */
    }
  }
  
  @media (max-width: 768px) {
    .category-component {
      grid-template-columns: repeat(2, 1fr); 
    }
  }
  
  @media (max-width: 480px) {
    .category-component {
      grid-template-columns: 1fr; 
    }
  }

  </style>
  