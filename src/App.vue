<template>
  <div class="container">
    <!-- Header -->
    <div class="header">
      <div><h2>Header</h2></div>
      <div class="page-links">
        <router-link
          v-for="page in pages"
          :key="page"
          :to="`/page/${page}`"
          :class="{ active: $route.params.pageNumber == page }"
        >
          Page {{ page }}
        </router-link>
      </div>
    </div>

    <!-- Sidebar-->
    <div class="menu">
      <div class="menu-title">Menu</div>
      <router-link
        v-for="section in sections"
        :key="section"
        :to="`/page/${$route.params.pageNumber}/section/${section}`"
        :class="{ active: $route.params.sectionNumber == section }"
      >
        Section {{ section }}
      </router-link>
    </div>

    <!-- Main Content -->
    <div class="content">
      <router-view :message="message" @updateMessage="updateMessage"></router-view>
    </div>

    <!-- Footer -->
    <div class="footer">
      Footer
    </div>
  </div>
</template>

<script>
export default {
  data() {
  return {
    pages: [1, 2, 3],
    sections: [1, 2, 3, 4],
    message: {
      text: "",
      page: 1
    }
  };
},

  methods:{
  updateMessage(message){
    this.message = message;
  }
}

  
};
</script>

<style scoped>

.container {
  display: grid;
  grid-template-areas: 
    "header header header"
    "menu content content"
    "footer footer footer";
  grid-template-columns: 1fr 3fr;
  grid-template-rows: 60px 1fr 50px;
  height: 100vh;
  border: 1px solid black;
}


.header {
  grid-area: header;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 20px;
  border-bottom: 1px solid black;
}

.menu {
  grid-area: menu;
  display: flex;
  flex-direction: column;
  border-right: 1px solid black;
}

.menu a {
  padding: 15px;
  text-decoration: none;
  color: black;
  border-bottom: 1px solid black;
}

.menu a.active {
  color: blue;
  font-weight: bold;
  text-decoration: underline;
}


.content {
  grid-area: content;
  padding: 20px;
}

.footer {
  grid-area: footer;
  text-align: center;
  padding: 15px;
  border-top: 1px solid black;
}

.page-links a {
  margin-right: 15px;
  text-decoration: none;
  color: black;
}

.page-links a.active {
  color: blue;
  font-weight: bold;
}
.menu-title{
  text-align: center;
  padding: 15px;
  font-size: 18px;
  font-weight: bold;
  background-color: #f4f4f4;
  border-bottom: 1px solid black;
}
</style>
