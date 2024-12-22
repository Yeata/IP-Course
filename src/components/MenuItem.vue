<template>
  <div class="menu-bar">
    <button class="category-btn">
      <iconify-icon icon="ion:grid-outline"></iconify-icon>
      Browse All Categories
      <iconify-icon icon="ion:chevron-down-outline"></iconify-icon>
    </button>

    <nav class="menu-items">
      <a href="#" class="hot-deals">
        <iconify-icon icon="ion:flame-outline"></iconify-icon> Hot Deals
      </a>
      <a href="#">Home</a>
      <div class="dropdown">
        <a href="#">Food <iconify-icon icon="ion:chevron-down-outline"></iconify-icon></a>
      </div>
      <div class="dropdown">
        <a href="#">Vegetables <iconify-icon icon="ion:chevron-down-outline"></iconify-icon></a>
      </div>
      <a href="#">Drink</a>
      <a href="#">Cookies</a>
      <div class="dropdown">
        <a href="#">Meat & Seafood <iconify-icon icon="ion:chevron-down-outline"></iconify-icon></a>
      </div>
      <a href="#">Bakery</a>
    </nav>

    <div class="support">
      <iconify-icon icon="ion:headset-outline"></iconify-icon>
      <span>099 777 888</span>
      <p>24/7 Support Center</p>
    </div>
  </div>
</template>

<script>
import { Icon } from '@iconify/vue';

export default {
  components: {
    Icon
  }
};
</script>

<style scoped>
.menu-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 30px;
  border-bottom: 1px solid #ddd;
}

.category-btn {
  background-color: #26a65b;
  color: white;
  padding: 10px 20px;
  border: none;
  display: flex;
  align-items: center;
  border-radius: 5px;
  cursor: pointer;
  gap: 10px;
}

.menu-items {
  display: flex;
  gap: 30px;
  align-items: center;
}

.menu-items a {
  text-decoration: none;
  color: #333;
  font-size: 16px;
}

.menu-items .hot-deals {
  color: #26a65b;
  font-weight: bold;
  display: flex;
  align-items: center;
  gap: 5px;
}

.dropdown {
  position: relative;
}

.dropdown a {
  display: flex;
  align-items: center;
  gap: 5px;
}

.support {
  display: flex;
  align-items: center;
  gap: 10px;
}

.support span {
  font-size: 18px;
  color: #26a65b;
  font-weight: bold;
}

.support p {
  margin: 0;
  font-size: 12px;
  color: #666;
}
</style>
