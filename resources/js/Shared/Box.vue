<template>
  <div class="box box-default mb-2">

    <div class="box-header with-border d-flex" v-if="$slots.header">
      <h4>
        <slot name="header"></slot>
      </h4>
    </div>

    <div class="box-body">
      <slot/>
    </div>

    <div class="box-footer" v-if="$slots.footer">
      <slot name="footer"></slot>
    </div>

  </div>
</template>

<script setup>

</script>

<style scoped>

</style>