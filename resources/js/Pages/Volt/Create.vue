<template>

  <Layout sidebar="volts.index">

    <Head title="Novo Volt"/>

    <PageInfo
      :back="route('volts.index')"
      pageIcon="fa fa-keyboard-o"
      pageTitle="Novo Volt"
    >
    </PageInfo>

    <div class="container pt-2">

      <div class="box box-primary">
        <div class="box-header with-border">
          <h4>Dados do novo Volt</h4>
        </div>

        <div class="box-body p-3">
          <form @submit.prevent="submit">

            <volt-form :form="form" :proprietarios="proprietarios"/>

            <FilePondInput
              v-model="form.anexos"
              accept="application/pdf, image/*"
            />
            <div v-if="form.errors.anexos" class="text-danger">{{ form.errors.anexos }}</div>

            <!--
            <div class="row mb-3">
              <div>
                Uso de inputs com máscata:
              </div>
              <div class="col">
                <input v-maska="'###'" class="form-control" placeholder="Ex: 123" type="text">
              </div>
              <div class="col">
                <input v-maska="{ mask: '(##) Z ####-####', tokens: { 'Z': { pattern: /[8-9]/ }}}" class="form-control" placeholder="Ex: (41) 9 91233-4567" type="text">
              </div>
              <div class="col">
                <input v-currency="config" v-model.lazy="amount" class="form-control" placeholder="R$ 123" type="text">
              </div>
            </div>
            -->

            <LoadingButton :loading="form.processing" disable-with='Criando...' icon="fa fa-plus-circle fa-2x" class="btn btn-primary" type="submit">
              Criar
            </LoadingButton>
          </form>
        </div>
      </div>

    </div>
  </Layout>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import VoltForm from "@/Pages/Volt/Partials/VoltForm";
import PageInfo from '@/Layout/PageInfo'
import LoadingButton from "@/Shared/LoadingButton";
import FilePondInput from '@/Components/FilePondInput'

const props = defineProps({
  proprietarios: Object
})

const form = useForm({
  name: null,
  status: true,
  proprietario_id: '',
  anexos: Array,
})

function submit() {
  form.post(route('volts.store'))
}
</script>
