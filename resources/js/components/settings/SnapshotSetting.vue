<template>
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
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import SettingContainer from '@components/SettingContainer.vue'
import SettingLink from '@components/SettingLink.vue'
import { faClone } from '@fortawesome/free-solid-svg-icons'
import { usePage } from '@inertiajs/inertia-vue3'

export default defineComponent({
  name: 'SnapshotSetting',
  components: {
    SettingContainer,
    SettingLink,
  },
  setup() {
    const server = usePage().props.value.server

    return {
      faClone,
      server,
    }
  },
})
</script>
