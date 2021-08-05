<template>
  <server-layout>
    <template #title>
      Security
    </template>

    Beep boop your password is bad
  </server-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'

export default {
  name: 'Security',
  components: {
    ServerLayout,
  },
  setup() {},
}
</script>
