<template>
  <server-layout>
    <template #title> Server Information </template>

    <template #main>
      <div class="grid gap-4 md:grid-cols-2">
        <setting-container>
          <h3 class="text-md leading-6 font-medium text-gray-900">Display Information</h3>
        </setting-container>
      </div>
    </template>
  </server-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'
import SettingContainer from '@components/SettingContainer.vue'

export default defineComponent({
  name: 'Information',
  components: {
    ServerLayout,
    SettingContainer,
  },
  setup() {},
})
</script>
