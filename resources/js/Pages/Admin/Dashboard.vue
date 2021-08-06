<template>
  <app-layout>
      <h1>This is the admin center. Only admins can view this page. If a client can, please report this as an issue on our repo Stratum-Panel/Stratum-Panel</h1>
  </app-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
  name: 'Dashboard',
  components: { AppLayout },
  setup() {},
})
</script>
