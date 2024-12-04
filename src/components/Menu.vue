<template>
    <div class="menu-component">
      <ul class="menu">
        <li
          @click="selectMenuItem('ALL')"
          :class="{ active: selectedMenu === 'ALL' }"
        >
          ALL
        </li>
  
        <!-- First Dynamic Tab (Category Product) -->
        <li
          v-if="menuItems.length > 0"
          @click="selectMenuItem(menuItems[0])"
          :class="{ active: selectedMenu === menuItems[0] }"
        >
          {{ menuItems[0] }}
        </li>
  
        <!-- Remaining Dynamic Tabs -->
        <li
          v-for="(item, index) in menuItems.slice(1)"
          :key="index"
          @click="selectMenuItem(item)"
          :class="{ active: selectedMenu === item }"
        >
          {{ item }}
        </li>
      </ul>
      <p v-if="errorMessage" class="error-message">{{ errorMessage }}</p>
    </div>
  </template>
  
<script>
import axios from "axios";

export default {
  data() {
    return {
      menuItems: [], 
      selectedMenu: "ALL", 
      errorMessage: null, 
    };
  },
  mounted() {
    this.fetchMenuItems();
  },
  methods: {
    async fetchMenuItems() {
      try {
        const response = await axios.get("http://localhost:3000/api/groups");
        this.menuItems = response.data; 
      } catch (error) {
        this.errorMessage = "Failed to load menu items. Please try again.";
        console.error("Error fetching menu items:", error);
      }
    },
    selectMenuItem(item) {
      this.selectedMenu = item;
      console.log(`Selected menu: ${item}`);
      this.$emit("menu-selected", item); 
    },
  },
};
</script>

<style scoped>
.menu-component {
  padding: 16px;
  font-family: Arial, sans-serif;
  display: flex;
  justify-content: flex-end; /* Moves the menu to the right */
}

.menu {
  display: flex;
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.menu li {
  margin-right: 16px;
  cursor: pointer;
  padding: 8px 12px;
  transition: color 0.3s, background-color 0.3s;
}

/* Remove the red line under the active item */
.menu li.active {
  font-weight: bold;
  color: red;
}

.menu li:hover {
  background-color: #f2f2f2;
}

.error-message {
  color: rgb(82, 76, 76);
  margin-top: 8px;
  font-size: 0.9rem;
}

</style>