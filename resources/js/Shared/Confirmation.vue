<template>

  <Modal :id="id" :button-class="buttonClass" :value="value">
    <template #title>
      <slot name="title">
        Confirmação
      </slot>
    </template>

    <slot>
    </slot>

    <template #footer>
      <slot name="footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">{{ cancelValue }}</button>
        <slot name="action">
        </slot>
      </slot>
    </template>
  </Modal>

</template>

<script>

import Modal from "../Shared/Modal";

export default {
  name: "Confirmation",

  components: {
    Modal
  },

  props: {
    id: {
      type: String,
    },
    value: {
      type: String,
    },
    confirm: {
      type: String,
    },
    buttonClass: {
      type: String,
      default: 'btn btn-default'
    },
    cancelValue: {
      type: String,
      default: 'Cancelar'
    }
  }
}
</script>