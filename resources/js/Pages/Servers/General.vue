<template>
  <server-layout>
    <template #title> General </template>

    <template #main>
      <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3">
        <power-setting />

        <snapshot-setting />

        <security-setting />
      </div>
    </template>
  </server-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'
import PowerSetting from '@components/settings/PowerSetting.vue'
import SnapshotSetting from '@components/settings/SnapshotSetting.vue'
import SecuritySetting from '@components/settings/SecuritySetting.vue'

export default defineComponent({
  name: 'General',
  components: {
    ServerLayout,
    PowerSetting,
    SnapshotSetting,
    SecuritySetting,
  },
  setup() {
  },
})
</script>
