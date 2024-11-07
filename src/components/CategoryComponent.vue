<template>
    <div class="category-component">
      <div v-for="category in categories" :key="category.id" class="category-item">
        <img :src="category.image" :alt="category.name" />
        <p>{{ category.name }}</p>
        <span>{{ category.items }} items</span>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "CategoryComponent",
    data() {
      return {
        categories: [
          { id: 1, name: "Cake & Milk", items: 14, image: "./src/assets/Burger.png" },
          { id: 2, name: "Peach", items: 17, image: "./src/assets/Snack.png" },
          { id: 3, name: "Organic Kiwi", items: 21, image: "./src/assets/kiwi.png" },
          { id: 4, name: "Red Apple", items: 68, image: "./src/assets/apple.png" },
          { id: 5, name: "Snack", items: 34, image: "./src/assets/Snack.png" },
          { id: 6, name: "Black Plum", items: 25, image: "./src/assets/blueberry.png" },
          { id: 7, name: "Vegetables", items: 63, image: "./src/assets/cabbage.png" },
          { id: 8, name: "Headphone", items: 33, image: "./src/assets/headphone.png" },
          { id: 9, name: "Gummy", items: 63, image: "./src/assets/gummy.png" },
          { id: 10, name: "Orange", items: 33, image: "./src/assets/orange.png" },
        ],
      };
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
  