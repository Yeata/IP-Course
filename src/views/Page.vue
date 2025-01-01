<template>
  <div>
    <h1>Welcome to Page {{ $route.params.pageNumber }}</h1>
    <div v-if="!$route.params.sectionNumber" class="section-view">
      <p>Message from Page {{ message.page }}: {{ message.text }}</p>
      <input type="text" v-model="localMessage" @input="updateLocalMessage" />
    </div>
    <router-view 
      :message="message" 
      :showInput="!$route.params.sectionNumber"
    ></router-view>
  </div>
</template>

<script>
export default {
  watch: {
    $route(to) {
      console.log('Page changed to:', to.params.pageNumber);
    }
  },
  props: ["message"],
  data() {
    return {
      localMessage: this.message.text
    };
  },
  methods: {
    updateLocalMessage() {
      this.$emit("updateMessage", {
        text: this.localMessage,
        page: this.$route.params.pageNumber
      });
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
