<template>
  <Layout>
    <Head title="Todo"/>

    <box class="mt-2">
      <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-between">
          <input class="form-control" placeholder="new task">
          <button class="btn btn-primary">
            <i class="fa fa-plus"></i>
          </button>
        </div>

        <div>
          <button class="btn btn-default">
            Grid
          </button>
        </div>
      </div>
    </box>

    <box class="box-primary">
      <template #header>Today 6-17-2022</template>
      <task>Fooo</task>
      <task>Fooo</task>
      <task>Fooo</task>
      <task>Fooo</task>
      <task>Fooo</task>
      <task>Fooo</task>

      <template #footer>
        <button class="btn btn-default">
          Done
          <span class="badge bg-primary">4</span>
        </button>
      </template>
    </box>

    <box class="box-warning">
      <template #header>Yesterday 6-16-2022</template>
      <task>Fooo</task>
    </box>

  </Layout>
</template>

<script setup>
import Box from '@/Shared/Box'
import Task from '@/Todo/Task'</script>

<style scoped>
</style>