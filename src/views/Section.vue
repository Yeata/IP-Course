<template>
  <div>
    <p>This is Section {{ $route.params.sectionNumber }} of Page {{ $route.params.pageNumber }}.</p>
  </div>
</template>

<script>
export default {
  watch: {
    $route(to) {
      console.log('Section changed to:', to.params.sectionNumber);
    }
  }
};
</script>

<style scoped>
h2 {
  color: #007bff;
}
</style>
