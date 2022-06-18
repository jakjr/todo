<template>
  <div class="d-flex justify-content-between align-items-center border-bottom py-2 px-1 task">

    <div><slot/></div>

    <div class="d-flex gap-1">
      <button class="btn btn-sm btn-default">
        <i class="fa fa-check"></i>
      </button>

      <button class="btn btn-sm btn-danger">
        <i class="fa fa-trash"></i>
      </button>
    </div>
  </div>
</template>

<script setup>
</script>

<style scoped>
div.task:hover {
  background-color: lightgray;
}
</style>