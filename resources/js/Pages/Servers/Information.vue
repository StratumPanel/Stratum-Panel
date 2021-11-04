<template>
  <server-layout>
    <template #title> Server Information </template>

    <template #main> </template>
  </server-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'

export default defineComponent({
  name: 'Information',
  components: {
    ServerLayout,
  },
  setup() {},
})
</script>
