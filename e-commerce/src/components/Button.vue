<template>
    <button class="button-component">{{ text }}</button>
  </template>
  
  <script>
  export default {
    name: "ButtonComponent",
    props: {
      text: {
        type: String,
        default: "Shop Now",
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
  