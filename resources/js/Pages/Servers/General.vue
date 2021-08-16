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
<<<<<<< HEAD
=======

>>>>>>> parent of 975a61e (Added SettingContainer on frontend)
export default defineComponent({
  name: 'General',
  components: {
    ServerLayout,
  },
  setup() {},
})
</script>