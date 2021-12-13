<template>
  <div class="flex items-center">
    <input
      :id="id"
      :name="name"
      :value="value"
      :checked="value === modelValue"
      type="radio"
      class="focus:ring-gray-500 h-4 w-4 text-gray-600 border-gray-300"
      @input="$emit('update:modelValue', value)"
    />
    <label :for="id" class="ml-3 block text-sm font-medium text-gray-700">
      <slot></slot>
    </label>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'Radio',
  emits: ['update:modelValue'],
  props: {
    modelValue: {
      type: String,
    },
    id: {
      type: String,
      required: true,
    },
    value: {
      type: String,
      required: false,
    },
    name: {
      type: String,
      required: false,
    },
  },
  setup() {
  },
})
</script>
