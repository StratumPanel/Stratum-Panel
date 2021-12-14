<template>
  <server-layout>
    <template #title> Server Information </template>
    <template #main>
      <div class="grid gap-4 md:grid-cols-2">
          <display-info-form />
          <bios-config-form />
          <network-config-form />
      </div>
    </template>
  </server-layout>
</template>

<script lang="ts">

import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'
import DisplayInfoForm from './modules/DisplayInfoForm.vue'
import BiosConfigForm from './modules/BiosConfigForm.vue'
import NetworkConfigForm from './modules/NetworkConfigForm.vue'

export default defineComponent({
  name: 'Index',
  components: {
    ServerLayout,
    DisplayInfoForm,
    BiosConfigForm,
    NetworkConfigForm,
  },
  setup () {},
})
</script>
