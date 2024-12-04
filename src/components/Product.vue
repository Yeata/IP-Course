<template>
  <div class="product-component">
    <div v-for="product in popularProducts" :key="product.id" class="product-item">
      
      <!-- Discount Badge -->
      <div v-if="product.promotionAsPercentage > 0" class="discount-badge">
        -{{ product.promotionAsPercentage }}%
      </div>

      <!-- Product Image and Add Button in a Row -->
      <div class="product-image-and-button">
        <img :src="'http://localhost:3000/' + parseImage(product.image)" :alt="product.name" class="product-image" />

        <!-- Product Name -->
        <p class="product-name">{{ product.name }}</p>

        <!-- Product Rating -->
        <div class="product-rating">
          <span v-for="star in 5" :key="star" class="star">
            {{ star <= product.rating ? "★" : "☆" }}
          </span>
          <span class="rating-number">({{ product.rating }})</span>
        </div>

        <!-- Price and Add Button in Same Row -->
        <div class="product-price-and-button">
          <!-- Product Price -->
          <span class="product-price">
            ${{ discountedPrice(product.price, product.promotionAsPercentage) }}
          </span>
          <span
            v-if="product.promotionAsPercentage > 0"
            class="product-original-price"
          >
            ${{ product.price }}
          </span>

          <!-- Show Add button only when quantity is 0 -->
          <button v-if="product.quantity === 0" @click="addProduct(product)" class="add-button">
            Add +
          </button>

          <!-- Show quantity input only when quantity is greater than 0 -->
          <input v-if="product.quantity > 0" type="number" v-model.number="product.quantity" min="1" :max="product.instock" class="quantity-input" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { useProductStore } from "@/Stores/Product";
import { computed, onMounted } from "vue";

export default {
  name: "ProductList",
  setup() {
    const productStore = useProductStore();

    // Fetch data when the component is mounted
    onMounted(() => {
      productStore.fetchProducts();
      productStore.fetchCategories();
    });

    // Using computed to access the store getters reactively
    const popularProducts = computed(() => productStore.getPopularProducts);

    // Helper function for discounted price (example)
    const discountedPrice = (price, promotionPercentage) => {
      if (promotionPercentage > 0) {
        return (price * (1 - promotionPercentage / 100)).toFixed(2);
      }
      return price.toFixed(2);
    };

    // Helper function for parsing image URL (if needed)
    const parseImage = (imagePath) => {
      return imagePath || 'default-image.jpg'; // You can adjust this as necessary
    };

    // Method to handle Add button click, increments the product quantity
    const addProduct = (product) => {
      product.quantity = 1; // Set quantity to 1 (or adjust as needed)
      console.log(`Product added: ${product.name}`);
    };

    return {
      popularProducts,
      discountedPrice,
      parseImage,
      addProduct,
    };
  },
};
</script>

<style>
.product-component {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  padding: 20px;
}

.product-item {
  background: #fff;
  border: 1px solid #e0e0e0;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
}

.product-image-and-button {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
}

.product-image {
  width: 100px;
  height: auto;
  border-radius: 8px;
  object-fit: cover;
}

.discount-badge {
  position: absolute;
  top: 10px;
  left: 10px;
  background-color: #e74c3c;
  color: white;
  padding: 5px 10px;
  font-size: 14px;
  font-weight: bold;
  border-radius: 4px;
}

.product-name {
  font-size: 16px;
  font-weight: bold;
  margin: 10px 0;
}

.product-rating {
  color: #f39c12;
  margin: 5px 0;
}

.product-rating .rating-number {
  font-size: 14px;
  color: #888;
  margin-left: 5px;
}

.product-price-and-button {
  display: flex;
  align-items: left;
  justify-content: space-between;
  width: 100%;
  margin-top: 15px;
}

.product-price {
  font-size: 18px;
  font-weight: bold;
  color: #27ae60;
}

.product-original-price {
  font-size: 14px;
  text-decoration: line-through;
  color: #888;
  margin-left: 5px;
}

.add-button {
  background-color: #27ae60;
  color: white;
  padding: 8px 12px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-left: 10px;
}

.add-button:hover {
  background-color: #2ecc71;
}

.quantity-input {
  width: 50px;
  text-align: center;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-left: 10px;
}

</style>