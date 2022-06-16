<script setup>
import { onMounted, ref, watch, defineExpose } from "vue";
import { create, registerPlugin } from "filepond";
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation';
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';

const props = defineProps({
  id: {
    type: String,
    default: 'filepod_' + Math.floor(Math.random() * 100) + 1
  },
  labelIdle: {
    default: 'Clique ou arraste seus arquivos aqui...',
    type: String
  },
  reset: {
    type: Boolean,
    default: false
  }
})

const emit = defineEmits(['update:modelValue', 'reseted'])

registerPlugin(
  FilePondPluginFileValidateType,
  FilePondPluginFileValidateSize,
  FilePondPluginImagePreview,
  FilePondPluginImageExifOrientation
)

onMounted(() => {
  const fileInput = document.querySelector('#' + props.id);

  const pond = create(fileInput, {
    storeAsFile: true,
    allowMultiple: true,
    credits: null,
    labelIdle: props.labelIdle,
    labelFileTypeNotAllowed: 'Tipo do arquivo não permitido'
  });

  pond.on('updatefiles', (files) => {
    emit(
      'update:modelValue',
      files.map(function (filepond) {
        return filepond.file
      })
    )
  });

  watch(() => props.reset, (selection, prevSelection) => {
    if (selection) {
      pond.removeFiles()
      emit('reseted')
    }
  })
})
</script>

<template>
  <input :id="id" type="file">
</template>

<style scoped>

</style>