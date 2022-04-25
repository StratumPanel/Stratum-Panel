<template>
  <setting
    :icon="faLock"
    title="Security Settings"
    description="Edit credentials to connect to your server."
  >
    <template #actions>
      <setting-link :href="route('servers.show.security', server.id)"
        >Open Security</setting-link
      >
    </template>
  </setting>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import Setting from '@components/Setting.vue'
import SettingLink from '@components/SettingLink.vue'
import { faLock } from '@fortawesome/free-solid-svg-icons'
import { usePage } from '@inertiajs/inertia-vue3'

export default defineComponent({
  name: 'SecuritySetting',
  components: {
    Setting,
    SettingLink,
  },
  setup() {
    const server = usePage().props.value.server

    return {
      faLock,
      server,
    }
  },
})
</script>
