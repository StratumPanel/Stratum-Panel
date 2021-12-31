<template>
  <div class="rounded-md bg-white shadow-md">
    <slot></slot>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'Card',
  setup() {},
})
</script>
