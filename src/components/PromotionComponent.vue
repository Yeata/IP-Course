<template>
    <div class="promotion-component">
      <div v-for="promotion in promotions" :key="promotion.id" class="promotion-item">
        <div class="promotion-content">
          <h3>{{ promotion.title }}</h3>
          <ButtonComponent/>
        </div>
        <img :src="'http://localhost:3000/'+promotion.image" :alt="promotion.title" class="promotion-image" />
      </div>
    </div>
  </template>
  
  <script>
  import { ref ,onMounted} from "vue";
  import ButtonComponent from "./ButtonComponent.vue";
  import axios from "axios";

  export default {
    name: "PromotionComponent",
    components: {
      ButtonComponent,
    },
    setup() {
    const promotions = ref([]);

    const fetchPromotions = async () => {
      try {
        const response = await axios.get('http://localhost:3000/api/promotions'); // Corrected endpoint
        promotions.value = response.data.map((item) => ({
          id: item.id,
          title: item.title,
          url: item.url,
          color: item.color,
          buttonColor: item.buttonColor,
          image: item.image,
        }));
      } catch (error) {
        console.error('Error fetching promotions:', error);
      }
    };

    onMounted(fetchPromotions);

    return { promotions };
  },
}
  </script>
  
  <style scoped>
  .promotion-component {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
    justify-content: space-evenly;
  }
  
  .promotion-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-direction: column;
    width: 100%;
    max-width: 350px;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s, box-shadow 0.2s;
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
    text-align: center;
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
    margin-top: 15px;
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
  