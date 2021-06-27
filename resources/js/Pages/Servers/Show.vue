<template>
  <app-layout>
    <template #header>
      <server-header :server="server" />
    </template>
  </app-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import ServerHeader from '@components/ServerHeader.vue'

export default defineComponent({
  name: 'Index',
  components: { AppLayout, ServerHeader },
  props: {
    server: {
      type: Object,
      required: true,
    },
  },
  setup() {},
})
</script>
