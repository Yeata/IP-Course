<template>
  <div>
    <h1>Welcome to Page {{ $route.params.pageNumber }}</h1>
    <div class="section-view">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  watch: {
    $route(to) {
      console.log('Page changed to:', to.params.pageNumber);
    }
  }
};
</script>

<style scoped>
.section-view {
  border: 1px solid #ddd;
  padding: 20px;
  margin-top: 20px;
}
</style>
