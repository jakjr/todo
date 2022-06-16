<template>

  <div class="mb-3 form-floating">
    <input id="name" v-model="form.name" :class="['form-control', form.errors.name ? 'is-invalid' : '']" placeholder="Nome">
    <label :class="['form-text', form.errors.name ? 'text-danger': '']" for="name">Nome</label>
    <div v-if="form.errors.name" class="invalid-feedback">{{ form.errors.name }}</div>
    <div v-else class="feedback">Campo obrigatório.</div>
  </div>

  <div class="mb-3">
    <TextInput id="apelido" label="Apelido" v-model="form.apelido" :error="form.errors.apelido"></TextInput>
  </div>

  <div class="mb-3">
    <label class="form-label" for="proprietario">Proprietário:</label>
    <select id="proprietario" v-model="form.proprietario_id" :class="{'is-invalid': form.errors.proprietario_id}" class="form-select form-select-lg mb-3">
      <option value="">-- Selecione --</option>
      <option v-for="proprietario in proprietarios" :value="proprietario.value">{{ proprietario.text }}</option>
    </select>
    <div v-if="form.errors.proprietario_id" class="invalid-feedback">{{ form.errors.proprietario_id }}</div>
    <div class="form-text">Quem é o "dono" deste volt?</div>
  </div>

  <div class="form-check form-switch mb-3">
    <label class="form-check-label" for="switch">Ativo</label>
    <input id="switch" v-model="form.status" class="form-check-input" role="switch" type="checkbox">
  </div>

  <div class="mb-3">
    <label class="form-check-label" for="anexos">Anexos:</label>

    <div v-if="medias">
      <div v-for="media in medias" class="d-flex gap-1">
        {{ media.file_name }}
        <Link :href="route('medias.destroy', media)" method="delete" as="button" type="button">X</Link>
      </div>
    </div>

  </div>

  <!--
    <div style="min-height: 100px;">
      <Multiselect
        v-model="value"
        :options="options"
      />
    </div>
    -->
</template>

<script setup>
import { ref } from 'vue'
import FilePondInput from '@/Components/FilePondInput'
import TextInput from "@/Shared/Form/TextInput";

const value = ref(null)
const options = [
  'Batman',
  'Robin',
  'Joker',
]

const props = defineProps({
  form: Object,
  proprietarios: Object,
  medias: Array
})

</script>

<style src="@vueform/multiselect/themes/default.css"></style>
<style scoped>

</style>