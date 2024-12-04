<template>
  <div class="promotion-component">
    <div
      v-for="promotion in promotions"
      :key="promotion.id"
      class="promotion-item"
      :style="{ backgroundColor: promotion.color }">
      <div class="promotion-content">
        <h3>{{ promotion.title }}</h3>
        <p>{{ promotion.description }}</p>
        <button :style="{ backgroundColor: promotion.buttonColor }" class="promotion-button">Shop Now</button>
      </div>
      <img :src="'http://localhost:3000/' + promotion.image" :alt="promotion.title" class="promotion-image" />
    </div>
  </div>
</template>

<script>
import { computed, onMounted } from "vue";
import * as Product from "@/Stores/Product"; 

export default {
  name: "PromotionComponent",
  setup() {
    const productStore = Product.useProductStore(); // Use the store to access promotions

    // Fetch promotions when the component is mounted
    onMounted(() => {
      productStore.fetchPromotions(); // This will trigger the fetch from the store
    });

    // Use computed to access promotions from the store
    const promotions = computed(() => productStore.promotions);

    return { promotions }; // Return promotions to bind to the template
  },
};
</script>

<style scoped>
.promotion-component {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
  padding: 20px;
}

.promotion-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-radius: 12px;
  padding: 20px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.promotion-item:hover {
  transform: scale(1.05);
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.promotion-content {
  flex: 1;
  padding-right: 20px;
}

.promotion-title {
  font-size: 18px;
  font-weight: bold;
  color: #333;
  margin: 0;
}

.promotion-description {
  font-size: 14px;
  color: #555;
  margin: 10px 0;
}

.promotion-button {
  padding: 10px 20px;
  font-size: 14px;
  font-weight: bold;
  color: #fff;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.promotion-button:hover {
  transform: translateY(-3px);
  background-color: rgba(0, 0, 0, 0.1);
}

.promotion-image {
  width: 150px;
  height: auto;
  object-fit: contain;
  margin-left: 20px;
  border-radius: 12px;
}

@media (max-width: 768px) {
  .promotion-item {
    flex-direction: column;
    text-align: center;
  }

  .promotion-content {
    padding-right: 0;
  }

  .promotion-image {
    margin-left: 0;
    margin-top: 15px;
  }
}
</style>
