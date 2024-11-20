<template>
    <div class="category-component">
      <div v-for="category in categories" :key="category.id" class="category-item">
        <img :src="'http://localhost:3000/'+category.image" :alt="category.name" />
        <p>{{ category.name }}</p>
        <span>{{ category.productCount }} items</span>
      </div>
    </div>
  </template>
  
  <script>
import axios from 'axios';
import { ref, onMounted } from 'vue';

export default {
  name: "CategoryComponent",
  setup() {
    const categories = ref([]);

    const fetchCategories = async () => {
      try {
        const res = await axios.get('http://localhost:3000/api/categories');
        categories.value = res.data.map((item) => ({
          id: item.id,
          name: item.name,
          productCount: item.productCount,
          color: item.color,
          image: item.image,
        }));
      } catch (error) {
        console.log(error);
      }
    };

    onMounted(fetchCategories);

    return { categories };
  },
};
</script>
  
  <style scoped>
  .category-component {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); /* Responsive grid layout */
    gap: 15px;
    padding: 30px;
    background-color: #eafde2;
    border-radius: 8px;
  }
  
  .category-item {
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    padding: 25px;
    text-align: center;
    transition: transform 0.2s, box-shadow 0.2s;
    font-size: 12px;
  }
  
  .category-item:hover {
    transform: scale(1.05); 
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
  }
  
  .category-item img {
    width: 100px; /* Adjusted width for uniform display */
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

  /* Alternate background colors for each card */
.category-item:nth-child(1) { background-color: #fef7e7; } /* Light yellow */
.category-item:nth-child(2) { background-color: #e8f5e9; } /* Light green */
.category-item:nth-child(3) { background-color: #f1f8e9; } /* Light kiwi green */
.category-item:nth-child(4) { background-color: #ffebee; } /* Light red */
.category-item:nth-child(5) { background-color: #fff3e0; } /* Light orange */
.category-item:nth-child(6) { background-color: #f3e5f5; } /* Light purple */
.category-item:nth-child(7) { background-color: #e8f5e9; } /* Light green */
.category-item:nth-child(8) { background-color: #e3f2fd; } /* Light blue */
.category-item:nth-child(9) { background-color: #fffde7; } /* Light yellow */
.category-item:nth-child(10) { background-color: #e3f2fd; } /* Light blue */
  </style>
  