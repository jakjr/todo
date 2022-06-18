<template>

  <button class="btn btn-default" @click="show = !show">
    Done
    <span class="badge bg-primary">
          {{ done.length }}
    </span>
  </button>

  <div v-if="show">
    <p class="mb-1 text-muted text-decoration-line-through" v-for="task in done">{{ task.description }}</p>
  </div>

</template>

<script setup>
import { ref } from "vue";

defineProps({
  done: Array
})

const show = ref(false)
</script>

<style scoped>
</style>