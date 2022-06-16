<template>

  <Layout sidebar="pagina-exemplo">

    <PageInfo
      :back="route('sobre')"
      pageIcon="fa fa-cogs"
      pageTitle="Título Exemplo"
    >
    </PageInfo>

    <div class="container-fluid pt-2">
      <div class="alert alert-info text-center">
        {{ message }}
      </div>
      <Link as="button" class="btn btn-primary mx-2" href="/message">Exibir mensagem!</Link>

      <Modal id="some_model" buttonClass="btn btn-danger mx-2" value="Modal">
        <template #title>
          Título da Modal
        </template>

        Corpo da modal
      </Modal>

      <Confirmation id='confirm_before_go' buttonClass="btn btn-primary" cancelValue="Voltar" value="Ir para listagem de volts">

        <template #title>
          Cofirmação necessária
        </template>

        <!-- default slot -->
        <div>Tem certeza que deseja sair desta página?</div>

        <template #action>
          <Link :href="route('volts.index')" as="button" class="btn btn-primary" data-bs-dismiss="modal" method="get" type="button">Volts</Link>
        </template>

      </Confirmation>

    </div>
  </Layout>
</template>

<script setup>
import Modal from "../Shared/Modal";
import Confirmation from "../Shared/Confirmation";

const props = defineProps({
  message: String
})

</script>
