<template>
  <server-layout>
    <template #title> General </template>

    <template #settings="{ server }">
      <div class="grid gap-4 grid-cols-3">
        <setting-container
          v-for="index in 3"
          :key="index"
          :icon="faBolt"
          title="Power Options"
          description="Send commands to manage the state of your instance."
        >
          <template #actions>
            <setting-link :href="route('servers.show', server.id)">Shutdown</setting-link>
          </template>
        </setting-container>
      </div>
    </template>
  </server-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'
import SettingContainer from '@components/SettingContainer.vue'
import { faBolt } from '@fortawesome/free-solid-svg-icons'
import SettingLink from '@components/SettingLink.vue'
export default defineComponent({
  name: 'General',
  components: {
    ServerLayout,
    SettingContainer,
    SettingLink,
  },
  setup() {
    return { faBolt }
  },
})
</script>
