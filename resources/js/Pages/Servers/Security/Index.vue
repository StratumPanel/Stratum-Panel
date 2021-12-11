<template>
  <server-layout>
    <template #title> Security </template>

    <template #main>
      <div class="grid gap-4 md:grid-cols-2">
        <update-password-form />
      </div>
    </template>
  </server-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'
import UpdatePasswordForm from './modules/UpdatePasswordForm.vue'

export default defineComponent({
  name: 'Index',
  components: {
    ServerLayout,
    UpdatePasswordForm,
  },
  setup() {
  },
})
</script>
