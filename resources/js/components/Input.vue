<template>
  <component :is="textarea ? 'textarea' : 'input'"
    class="
      border-gray-300
      focus:border-indigo-300
      focus:ring
      focus:ring-indigo-200
      focus:outline-none
      focus:ring-opacity-50
      rounded-md
      shadow-sm
      border
    "
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
    ref="input"
  />
</template>

<script>
export default {
  props: {
    modelValue: {
      type: String,
      required: false
    },
    textarea: {
      type: Boolean,
      required: false
    }
  },

  emits: ['update:modelValue'],

  methods: {
    focus() {
      this.$refs.input.focus()
    },
  },
}
</script>
