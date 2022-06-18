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

    <box v-for="(tasks, date) in todos">
      <template #header>{{ date }}</template>

      <task v-for="task in tasks.todo">{{ task.description }}</task>

      <template #footer>
        <done-footer :done="tasks.done"></done-footer>
      </template>
    </box>

  </Layout>
</template>

<script setup>
import Box from '@/Shared/Box'
import Task from '@/Todo/Task'
import DoneFooter from '@/Todo/DoneFooter'

defineProps({
  todos: Object
})

</script>



<style scoped>
</style>