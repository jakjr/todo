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
          <Link :href="route('list')" class="btn btn-default" as="button">
            <i class="fa fa-list"></i>
            List view
          </Link>
        </div>
      </div>
    </box>

    <box v-for="(tasks, date) in todos">
      <template #header>{{ date }}</template>

      <Draggable
        :list="tasks.todo"
        drag-class="drag"
        ghost-class="ghost"
        item-key="id"
        @change="onChange"
      >
        <template #item="{element}">
          <task :task="element">{{ element.description }}</task>
        </template>
      </Draggable>

      <template v-if="tasks.done" #footer>
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
import Draggable from 'vuedraggable'
import { Inertia } from "@inertiajs/inertia";

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

function onChange(e) {
  let item = e.added || e.moved;

  if (!item) return;

  let index = item.newIndex;

  let task = props.todos[item.element.day]['todo'][index];
  let prev = props.todos[item.element.day]['todo'][index - 1];
  let next = props.todos[item.element.day]['todo'][index + 1];

  let position = task.position;

  if (prev && next) {
    position = (parseFloat(prev.position) + parseFloat(next.position)) / 2;
  } else if (next) {
    position = parseFloat(next.position) + ((parseFloat(next.position) / 2));
  } else if (prev) {
    position = parseFloat(prev.position) / 2;
  }

  Inertia.put(route('tasks.move', task), {
    'position': position
  })
}


</script>


<style scoped>
</style>