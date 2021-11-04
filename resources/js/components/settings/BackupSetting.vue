<template>
  <setting
    :icon="faBolt"
    title="Power Options"
    description="Send commands to manage the state of your instance."
  >
    <template #actions>
      <setting-link
        :href="route('servers.show.information', server.id)"
        >{{ statusActions[powerState] }}</setting-link
      >
    </template>
  </setting>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import SettingLink from '@components/SettingLink.vue'
import Setting from '@components/Setting.vue'
import { usePage } from '@inertiajs/inertia-vue3'

export default defineComponent({
    name: 'BackupSetting',
    components: {
        SettingLink,
        Setting,
    },
    setup() {
        const server = usePage().props.value.server

        return { server }
    },
});
</script>