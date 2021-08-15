<template>
  <server-layout>
    <template #title> General </template>

    <div class="grid gap-4 grid-cols-3">
      <setting-container
        :icon="faBolt"
        title="Power Options"
        description="Send commands to manage the state of your instance."
      />
      <setting-container
        :icon="faBolt"
        title="Power Options"
        description="Send commands to manage the state of your instance."
      />
      <setting-container
        :icon="faBolt"
        title="Power Options"
        description="Send commands to manage the state of your instance."
      />
    </div>
  </server-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'
import SettingContainer from '@components/SettingContainer.vue'
import { faBolt } from '@fortawesome/free-solid-svg-icons'

export default defineComponent({
  name: 'General',
  components: {
    ServerLayout,
    SettingContainer,
  },
  setup() {
    return { faBolt }
  },
})
</script>
