<template>
    <div class="header">
      <div class="logo">
        <img src="@/assets/shop_logo.png" alt="Melon Mart & Grocery" />
        <span>MELON<br><small>MART & GROCERY</small></span>
      </div>
  
      <div class="search-box">
        <select class="category-dropdown">
          <option>All Categories</option>
          <option>Vegetables</option>
          <option>Fruits</option>
        </select>
        <input type="text" placeholder="Search for items" class="search-input" />
        <button class="search-btn">
          <iconify-icon icon="ion:search"></iconify-icon>
        </button>
      </div>
  
      <div class="account-section">
        <a href="#">
          <iconify-icon icon="ion:person-outline"></iconify-icon> Account
        </a>
        <a href="#">
          <iconify-icon icon="ion:sync-outline"></iconify-icon> Compare
        </a>
        <a href="#">
          <iconify-icon icon="ion:heart-outline"></iconify-icon> Wishlist
        </a>
        <a href="#">
          <iconify-icon icon="ion:cart-outline"></iconify-icon>
        </a>
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
  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    border-bottom: 1px solid #ddd;
  }
  
  .logo {
    display: flex;
    align-items: center;
    font-size: 22px;
    font-weight: bold;
  }
  
  .logo img {
    height: 50px;
    margin-right: 10px;
  }
  
  .search-box {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
  }
  
  .category-dropdown {
    border: none;
    padding: 10px;
    background-color: #f9f9f9;
  }
  
  .search-input {
    border: none;
    padding: 10px;
    width: 300px;
  }
  
  .search-btn {
    background-color: #fff;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
  }
  
  .account-section a {
    margin-left: 20px;
    text-decoration: none;
    color: #333;
    display: inline-flex;
    align-items: center;
  }
  
  account-section iconify-icon {
    margin-right: 5px;
    font-size: 20px;
  }
  </style>
  