<template>
  <server-layout>
    <template #title> General </template>

    <template #main="{ server }">
      <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3">
        <power-setting />

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
  faClone,
} from '@fortawesome/free-solid-svg-icons'
import SettingLink from '@components/SettingLink.vue'
import { usePage } from '@inertiajs/inertia-vue3'
import editPowerState from '@/api/server/editPowerState'
import PowerSetting from '@components/settings/PowerSetting.vue'

export default defineComponent({
  name: 'General',
  components: {
    ServerLayout,
    SettingContainer,
    SettingLink,
    PowerSetting,
  },
  setup() {

    return {
      faBolt,
      faClone,
      editPowerState,
    }
  },
})
</script>
