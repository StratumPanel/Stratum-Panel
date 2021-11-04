<template>
  <div class="p-4 border border-gray-200 rounded-md">
    <slot></slot>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'SettingContainer',
  setup() {},
})
</script>
