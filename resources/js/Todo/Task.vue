<template>
  <div>
    <div class="d-flex justify-content-between align-items-center border-bottom py-2 px-1 task">

      <div>
        <slot/>
      </div>

      <div class="d-flex gap-1">
        <Link :href="route('tasks.done', task)" as="button" class="btn btn-sm btn-default" method="put" preserve-scroll>
          <i class="fa fa-check"></i>
        </Link>

        <Link :href="route('tasks.destroy', task)" as="button" class="btn btn-sm btn-danger" method="delete" preserve-scroll>
          <i class="fa fa-trash"></i>
        </Link>
      </div>
    </div>

  </div>
</template>

<script setup>
defineProps({
  task: Object
})
</script>

<style scoped>
div.task:hover {
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

.drag {
}

.drag > .task {
  /*background: red;*/
}

.ghost {
  background: lightgrey;
}

.ghost > div {
  visibility: hidden;
}

</style>