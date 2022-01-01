<template>
  <admin-layout :nestedLinks="nestedLinks">
    <template #main>
      <h1>node health</h1>
    </template>
  </admin-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import nestedLinks from './nestedLinks'

export default defineComponent({
  name: 'Health',
  components: { AdminLayout },
  setup() {
    return { nestedLinks }
  },
})
</script>
