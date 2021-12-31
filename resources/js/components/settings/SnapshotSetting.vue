<template>
  <setting
    :icon="faClone"
    title="Snapshots"
    description="Manage snapshots on your server."
  >
    <template #actions>
      <setting-link :href="route('servers.show.snapshots.index', server.id)"
        >View Snapshots</setting-link
      >
    </template>
  </setting>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import Setting from '@components/Setting.vue'
import SettingLink from '@components/SettingLink.vue'
import { faClone } from '@fortawesome/free-solid-svg-icons'
import { usePage } from '@inertiajs/inertia-vue3'

export default defineComponent({
  name: 'SnapshotSetting',
  components: {
    Setting,
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
