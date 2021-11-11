<template>
  <server-layout>
    <template #title> Server Information </template>

    <template #main>
      <div class="grid gap-4 md:grid-cols-2">
        <template #title> Display Info </template>
      </div>
    </template>
  </server-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'
import FormSection from '@components/FormSection.vue'

export default defineComponent({
  name: 'Information',
  components: {
    ServerLayout,
    FormSection,
  },
  setup() {},
})
</script>
