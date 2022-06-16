<template>
    <div>
        <label v-if="label" :class="['form-label', error ? 'text-danger': '']" :for="id">{{ label }}:</label>

        <input :id="id" ref="input" :class="['form-control', { 'is-invalid': error }]" :type="type" :value="modelValue"
               v-bind="$attrs" @input="$emit('update:modelValue', $event.target.value)"/>

        <div v-if="helper" :class="{'invalid-feedback': error}" class="feedback">{{ helper }}</div>

        <div v-if="error" class="invalid-feedback">{{ error }}</div>
    </div>
</template>

<script>
export default {
    name: "Form/TextInput",
    inheritAttrs: false,
    props: {
        id: {
            type: String,
        },
        type: {
            type: String,
            default: 'text',
        },
        modelValue: String,
        label: String,
        helper: String,
        error: String,
    },
    methods: {
        focus() {
            this.$refs.input.focus()
        },
        select() {
            this.$refs.input.select()
        },
        setSelectionRange(start, end) {
            this.$refs.input.setSelectionRange(start, end)
        },
    },
}
</script>
