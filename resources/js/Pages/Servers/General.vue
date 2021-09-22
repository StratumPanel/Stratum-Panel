<template>
  <server-layout>
    <template #title> General </template>

    <template #main="{ server }">
      <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3">
        <setting-container
          :icon="faBolt"
          title="Power Options"
          description="Send commands to manage the state of your instance."
        >
          <template #actions>
            <setting-link
              :href="route('servers.show', server.id)"
              :items="powerOptions"
              dropdown
              >Shutdown</setting-link
            >
          </template>
        </setting-container>

        <setting-container
          :icon="faClone"
          title="Snapshots"
          description="Manage snapshots on your server."
        >
          <template #actions>
            <setting-link :href="route('servers.show.snapshots', server.id)"
              >View Snapshots</setting-link
            >
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
import {
  faBolt,
  faBan,
  faStop,
  faUndo,
  faPlay,
  faClone,
} from '@fortawesome/free-solid-svg-icons'
import SettingLink from '@components/SettingLink.vue'
import { usePage } from '@inertiajs/inertia-vue3'
import editPowerState from '@/api/server/editPowerState'

export default defineComponent({
  name: 'General',
  components: {
    ServerLayout,
    SettingContainer,
    SettingLink,
  },
  setup() {
    const server = usePage().props.value.server

    const powerOptions = [
      {
        name: 'Start',
        icon: faPlay,
        callback: () => editPowerState(server.id, 'start'),
      },
      {
        name: 'Shutdown',
        icon: faStop,
        callback: () => editPowerState(server.id, 'shutdown'),
      },
      {
        name: 'Kill',
        icon: faBan,
        callback: () => editPowerState(server.id, 'kill'),
      },
      {
        name: 'Restart',
        icon: faUndo,
        callback: () => editPowerState(server.id, 'restart'),
      },
    ]

    return { faBolt, faClone, powerOptions }
  },
})
</script>
