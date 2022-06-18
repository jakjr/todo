<template>
  <Layout>
    <Head title="Todo"/>

    <box class="mt-2">
      <div class="d-flex justify-content-between">

        <form @submit.prevent="create()">
          <div class="d-flex justify-content-between">
            <input v-model="form.description" class="form-control" placeholder="new task">
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-plus"></i>
            </button>
          </div>
        </form>


        <div>
          <button class="btn btn-default">
            Grid
          </button>
        </div>
      </div>
    </box>

    <box v-for="(tasks, date) in todos">
      <template #header>{{ date }}</template>

      <task v-for="task in tasks.todo" :task="task">{{ task.description }}</task>

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
import { useForm } from "@inertiajs/inertia-vue3";

defineProps({
  todos: Object
})

const form = useForm({
  description: null
})

function create() {
  form.post(route('tasks.store'), {
    onSuccess: () => form.reset(),
  })
}

</script>


<style scoped>
</style>