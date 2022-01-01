<template>
  <td class="px-6 py-4 whitespace-nowrap">
    <template v-if="text">
      <div class="text-sm text-gray-500"><slot></slot></div>
    </template>
    <template v-else>
        <slot></slot>
    </template>
  </td>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'TableRowBox',
  props: {
    text: {
      type: Boolean,
      required: false,
    },
  },
  setup() {},
})
</script>
