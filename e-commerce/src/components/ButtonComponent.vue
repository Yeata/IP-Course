<template>
  <button class="button-component" @click="console.log('hi');">hi</button>
</template>

<script>
export default {
  name: "ButtonComponent",
  props: {
    text: {
      type: String,
      default: "ghfghffhggfhgfh",
    },
  },
};
</script>

<style scoped>
.button-component {
  background-color: #28a745;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
</style>
