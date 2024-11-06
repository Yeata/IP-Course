<<template>
  <div class="promotion-component">
    <div v-for="promotion in promotions" :key="promotion.id" class="promotion-item">
      <div class="promotion-content">
        <h3>{{ promotion.title }}</h3>
        <ButtonComponent :text="'Shop Now'" />
      </div>
      <img :src="promotion.image" :alt="promotion.title" class="promotion-image" />
    </div>
  </div>
</template>

<script>
import ButtonComponent from "./Button.vue";

export default {
  name: "PromotionComponent",
  components: {
    ButtonComponent,
  },
  data() {
    return {
      promotions: [
        {
          id: 1,
          title: "Make your Breakfast Healthy and Easy",
          image: "./src/items/Onion.png",
        },
        {
          id: 2,
          title: "The Best Organic Products Online",
          image: "./src/items/Drink.png",
        },
        {
          id: 3,
          title: "Get Fresh Veggies Delivered",
          image: "./src/items/Vegetable.png",
        },
      ],
    };
  },
};
</script>

<style scoped>
.promotion-component {
  display: flex;
  justify-content: space-between;
  gap: 20px;
  padding: 20px;
}

.promotion-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  max-width: 350px; /* Adjust based on your layout */
  background-color: #f8f8f8;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s, box-shadow 0.2s;
  background-color: #f9f9f9; /* Customize based on each promotion */
}

.promotion-item:nth-child(1) {
  background-color: #fef7e7; /* Light yellow */
}

.promotion-item:nth-child(2) {
  background-color: #f7e9f0; /* Light pink */
}

.promotion-item:nth-child(3) {
  background-color: #e8f3fa; /* Light blue */
}

.promotion-item:hover {
  transform: translateY(-5px);
  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
}

.promotion-content {
  flex: 1;
}

.promotion-content h3 {
  font-size: 18px;
  color: #333;
  margin: 10px 0;
}

.promotion-image {
  width: 120px;
  height: auto;
  object-fit: contain;
  margin-left: 15px;
}

@media (max-width: 768px) {
  .promotion-component {
    flex-direction: column;
    align-items: center;
  }

  .promotion-item {
    flex-direction: column;
    text-align: center;
    max-width: 100%;
  }

  .promotion-image {
    margin: 20px 0 0 0;
  }
}
</style>

