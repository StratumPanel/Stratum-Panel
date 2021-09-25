<template>
  <server-layout>
    <template #title>
      <div class="flex items-center">
        <go-back-button />

        <span class="ml-8">Snapshots</span>
      </div>
    </template>

    <template #main> </template>
  </server-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'
import GoBackButton from '@components/GoBackButton.vue'

export default defineComponent({
  name: 'Index',
  components: {
    ServerLayout,
    GoBackButton,
  },
  setup() {
    return {}
  },
})
</script>
