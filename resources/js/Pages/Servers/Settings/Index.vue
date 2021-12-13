<template>
  <server-layout>
    <template #title> Server Information </template>
    <template #main>
      <div class="grid gap-4 md:grid-cols-2">
          <update-display-info-form />
          <update-bios-config-form />
      </div>
    </template>
  </server-layout>
</template>

<script lang="ts">

import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'
import UpdateDisplayInfoForm from './modules/UpdateDisplayInfoForm.vue'
import UpdateBiosConfigForm from './modules/UpdateBiosConfigForm.vue'

export default defineComponent({
  name: 'Index',
  components: {
    ServerLayout,
    UpdateDisplayInfoForm,
    UpdateBiosConfigForm,
  },
  setup () {},
})
</script>
