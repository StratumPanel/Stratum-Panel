<template>
  <server-layout>
    <template #title>
      <div class="flex items-center">
        <go-back-button />

        <span class="ml-8">Snapshots</span>
      </div>
    </template>

    <template #main>
      <div class="flex justify-end">
        <button class="btn">Create Snapshot</button>
      </div>
      <div class="flex flex-col space-y-3 py-2">
        <snapshot-row
          v-for="snapshot in snapshots"
          :key="snapshot"
          :snapshot="snapshot"
        />
      </div>
    </template>
  </server-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'
import GoBackButton from '@components/GoBackButton.vue'
import SnapshotRow from '@components/SnapshotRow.vue'

export default defineComponent({
  name: 'Index',
  components: {
    ServerLayout,
    GoBackButton,
    SnapshotRow,
  },
  props: {
    snapshots: {
      type: Object,
      required: true,
    },
  },
  setup() {
    return {}
  },
})
</script>
