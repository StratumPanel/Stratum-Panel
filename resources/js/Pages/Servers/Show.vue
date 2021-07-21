<template>
  <app-layout>
    <template #header>
      <server-header :server="server" />
    </template>

    <div class="server-container h-72">
      <server-nav />

      <div class="inset-0 border border-gray-200 rounded-md"></div>
    </div>

  </app-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import ServerHeader from '@components/ServerHeader.vue'
import ServerNav from '@components/ServerNav.vue'

export default defineComponent({
  name: 'Index',
  components: { AppLayout, ServerHeader, ServerNav },
  props: {
    server: {
      type: Object,
      required: true,
    },
  },
  setup() {},
})
</script>

<style scoped>
.server-container {
  display: grid;
  gap: 1.5rem;
  grid-template-columns: 1fr 3fr;
}
</style>