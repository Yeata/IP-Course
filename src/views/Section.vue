<template>
  <div>
    <p>This is Section {{ $route.params.sectionNumber }} of Page {{ $route.params.pageNumber }}.</p>
    <div v-if="showInput">
      <p>Message from Page {{ message.page }}: {{ message.text }}</p>
      <input type="text" v-model="localMessage" @input="updateLocalMessage" />
    </div>
  </div>
</template>

<script>
export default {
  watch: {
    $route(to) {
      console.log('Section changed to:', to.params.sectionNumber);
    }
  },
  props: ["message", "showInput"],
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
p {
  margin-bottom: 10px;
}
</style>
