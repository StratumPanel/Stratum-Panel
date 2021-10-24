<template>
  <button
    :type="type"
    class="
      inline-flex
      items-center
      px-4
      py-2
      bg-gray-800
      border border-transparent
      rounded-md
      font-semibold
      text-xs text-white
      hover:bg-gray-700
      focus:outline-none focus:ring focus:ring-gray-300
      disabled:opacity-25
      transition
    "
  >
    <slot></slot>
  </button>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'Button',
  props: {
    type: {
      type: String,
      default: 'submit',
    },
  },
  setup() {},
})
</script>
