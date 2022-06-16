<template>
  <Layout sidebar="volts.index">
    <Head title="Form Index"/>

    <PageInfo
      pageIcon="fa fa-keyboard-o"
      pageTitle="Exemplo de um CRUD"
    >
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">
            Volts
          </li>
        </ol>
      </nav>
    </PageInfo>

    <div class="container-fluid pt-2">

      <div class="box box-primary">

        <div class="box-header with-border d-flex justify-content-between align-items-center">
          <h3>Listagem de Volts</h3>

          <Link :href="route('volts.create')" as="button" class="btn btn-primary btn-lg d-flex align-items-center gap-1" type="button">
            <i class="fa fa-plus-circle fa-2x"></i>
            <span>Novo</span>
          </Link>

        </div>

        <div class="box-header with-border">
          <div :class="{ 'alert-primary': filters.isDirty }" class="d-flex gap-1 alert m-0">
            <h3>
              Filtros:
            </h3>

            <div>
              <input v-model="filters.nameTerm" class="form-control" placeholder="Buscar por nome...">
            </div>

            <div>
              <select v-model="filters.status" class="form-select" style="color: black; padding-right: 2rem">
                <option value="">Todos os status</option>
                <option value="1">Somente ativos</option>
                <option value="0">Somente inativos</option>
              </select>
            </div>

            <div>
              <button :class="[filters.importante ? 'btn-secondary' : 'btn-default']" class="btn" @click="filters.importante = !filters.importante">
                Importantes
                <span class="badge bg-primary">{{ importantes }}</span>
              </button>
            </div>

            <div>
              <button class="btn btn-default" @click="filters.reset()">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="box-body">
          <table class="table table-hover">
            <thead>
            <tr>
              <th class="col-6 pointer" scope="col" @click="orderBy('name')">
                Nome
                <i v-if="props.orderBy == 'nameasc'" class="fa fa-sort-alpha-asc"></i>
                <i v-if="props.orderBy == 'namedesc'" class="fa fa-sort-alpha-desc"></i>
              </th>

              <th class="col-2 pointer" scope="col" @click="orderBy('proprietario')">
                Proprietário
                <i v-if="props.orderBy == 'proprietarioasc'" class="fa fa-sort-alpha-asc"></i>
                <i v-if="props.orderBy == 'proprietariodesc'" class="fa fa-sort-alpha-desc"></i>
              </th>
              <th class="col-2 pointer" scope="col" @click="orderBy('status')">
                Status
                <i v-if="props.orderBy == 'statusasc'" class="fa fa-sort-asc"></i>
                <i v-if="props.orderBy == 'statusdesc'" class="fa fa-sort-down"></i>
              </th>
              <th class="col-2 pointer" scope="col" @click="orderBy('updated_at')">
                Atualização
                <i v-if="props.orderBy == 'updated_atasc'" class="fa fa-sort-asc"></i>
                <i v-if="props.orderBy == 'updated_atdesc'" class="fa fa-sort-down"></i>
              </th>
              <th class="col-2" scope="col">Ações</th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="volt in volts.data" :key="volt.id" :class="{warning: lastSeen == volt.id}">
              <td>
                <div class="d-flex gap-1 justify-content-start align-items-center">
                  <a style="cursor: pointer!important;" @click="toggleImportante(volt)">
                    <i v-if="volt.importante" class="fa fa-star"></i>
                    <i v-else class="fa fa-star-o"></i>
                  </a>
                  {{ volt.name }}
                  <div v-if="volt.media_count" class="d-flex gap-1 justify-content-start">
                    <div v-for="media in volt.media" class="badge bg-primary">
                      {{ media.file_name }}
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ volt.proprietario }}</td>
              <td class="text-center">
                <div class="form-check form-switch">
                  <input :checked="volt.status" class="form-check-input" role="switch" style="cursor: pointer!important;" type="checkbox" @click="toggleStatus(volt)">
                </div>
              </td>
              <td>{{ volt.updated_at }}</td>
              <td>
                <Link :href="route('volts.edit', volt.id)">
                  editar
                </Link>
              </td>
            </tr>

            </tbody>
          </table>
        </div>
      </div>

      <div class="d-flex justify-content-center">
        <Pagination :links="volts.meta"/>
      </div>
    </div>
  </Layout>
</template>

<script setup>
import Pagination from "@/Shared/Pagination";
import { useFilter } from "@/Components/Filter/Composables/useFilter";
import { usePersistScroll } from "@/Composables/usePersistScroll";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  volts: Object,
  filters: Object,
  lastSeen: Number,
  importantes: Number,
  orderBy: String
})

const filters = useFilter(route('volts.filter'), 'put',
  {
    nameTerm: props.filters.nameTerm ?? '',
    status: props.filters.status ?? '',
    importante: props.filters.importante ?? false,
  },
  {
    nameTerm: '',
    status: '',
    importante: false,
  })

function toggleStatus(volt) {
  Inertia.put(
    route('volts.toggle-status', volt.id),
    {},
    { preserveState: true, preserveScroll: true }
  )
}

function toggleImportante(volt) {
  Inertia.put(
    route('volts.toggle-importante', volt.id),
    {},
    { preserveState: true, preserveScroll: true }
  )
}

usePersistScroll()

function orderBy(column) {
  Inertia.get(
    route('volts.orderby', [column])
  )
}

</script>

<style scoped>
tr.warning {
  background-color: #fff3cd;
}

.pointer {
  cursor: pointer !important;
}
</style>