<template>
  <div>
   <header>
    <nav>
      <router-link to="/page1">Page 1</router-link>
      <router-link to="/page2">Page 2</router-link>
      <router-link to="/page3">Page 3</router-link>
    </nav>
   </header>
   <router-link/>
  </div>
</template>

<script>
export default {
  name:"App",
};
</script>
<style>
nav {
  display: flex;
  gap: 20px;
}
</style>