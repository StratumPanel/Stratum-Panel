<template>
  <server-layout>
    <template #title> General </template>

    <template #main="{ server }">
      <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3">
        <power-setting />

        <snapshot-setting />
      </div>
    </template>
  </server-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'
import PowerSetting from '@components/settings/PowerSetting.vue'
import SnapshotSetting from '@components/settings/SnapshotSetting.vue'

export default defineComponent({
  name: 'General',
  components: {
    ServerLayout,
    PowerSetting,
    SnapshotSetting,
  },
  setup() {
  },
})
</script>
