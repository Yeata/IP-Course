<template>
    <div class="showcase">
      <div class="image-container">
        <img src="@/assets/imgShowcase.png" alt="Apples in a bag" />
        <div class="content">
          <h1>Don’t miss amazing grocery deals</h1>
          <p>Sign up for the daily newsletter</p>
          <div class="subscribe">
            <input 
              type="email" 
              v-model="email" 
              placeholder="Your email address" 
            />
            <button @click="subscribe">Subscribe</button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        email: ''
      };
    },
    methods: {
      subscribe() {
        alert(`Subscribed with: ${this.email}`);
      }
    }
  };
  </script>
  
  <style scoped>
  .showcase {
    position: relative;
    width: 100%;
 
  }
  
  .image-container {
    position: relative;
    overflow: hidden;
  }
  
  .image-container img {
    width: 100%;
    height: auto;
    display: block;
  }
  
  .content {
    position: absolute;
    top: 50%;
    left: 30%;
    transform: translate(-50%, -50%);
    color:0000;
    text-align: left;
    padding: 20px;
    border-radius: 10px;
  }
  
  .content h1 {
    font-size: 5rem;
    margin-bottom: 10px;
  }
  
  .content p {
    font-size: 2rem;
    margin-bottom: 20px;
  }
  
  .subscribe {
    display: flex;
    justify-content: left;
    gap: 10px;
  }
  
  .subscribe input {
    padding: 10px;
    border: none;
    border-radius: 5px;
    width: 300px;
    font-size: 1.2rem;
  }
  
  .subscribe button {
    padding: 10px 20px;
    background-color: #26a65b;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    font-weight: bold;
  }
  
  .subscribe button:hover {
    background-color: #1e8549;
  }
  </style>
  