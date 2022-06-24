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
          <Link :href="route('grid')" as="button" class="btn btn-default" preserve-state>
            <i class="fa fa-th-large"></i>
            Grid view
          </Link>
        </div>
      </div>
    </box>

    <box>
      <template #header>Todos:</template>

      <div class="table-responsive">
        <table class="table">
          <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="task in todos">
            <td>{{ task.day }}</td>
            <td>{{ task.description }}</td>
            <td>
              <div class="d-flex gap-1">
                <Link :href="route('tasks.done', task)" as="button" class="btn btn-sm btn-default" method="put" preserve-scroll>
                  <i class="fa fa-check"></i>
                </Link>

                <Link :href="route('tasks.destroy', task)" as="button" class="btn btn-sm btn-danger" method="delete" preserve-scroll>
                  <i class="fa fa-trash"></i>
                </Link>
              </div>
            </td>
          </tr>
          </tbody>
        </table>
      </div>

    </box>

  </Layout>
</template>

<script setup>
import Box from '@/Shared/Box'
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
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