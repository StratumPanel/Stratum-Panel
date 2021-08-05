<template>
  <server-layout>
    <template #title>
      General
    </template>

    Something is supposed to be here in general...
  </server-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'

export default {
  name: 'General',
  components: {
    ServerLayout,
  },
  setup() {},
}
</script>
