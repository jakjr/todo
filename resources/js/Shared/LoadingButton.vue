<template>
  <button :disabled="loading" class="d-flex align-items-center gap-1">
    <i v-if="icon" :class="icon"></i>
    <div v-if="loading && disableWith">
      {{ disableWith }}
    </div>
    <template v-else>
      <slot/>
    </template>
    <span v-if="loading" aria-hidden="true" class="spinner-grow spinner-grow-sm" role="status"></span>
  </button>
</template>

<script>
export default {
  props: {
    loading: Boolean,
    disableWith: String,
    icon: String
  },
}
</script>
