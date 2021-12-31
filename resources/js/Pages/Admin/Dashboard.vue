<template>
  <app-layout>
    <div class="grid grid-rows-2 grid-cols-2 gap-4 md:grid-rows-1 md:grid-cols-4 md:gap-8">
      <card-statistic
        class="grid-cols-1"
        :icon="faLayerGroup"
        title="Server Count"
        :body="server_count"
      />
      <card-statistic
        class="grid-cols-1"
        :icon="faHeartbeat"
        title="Node Health"
        body="Ready"
      />
      <card-statistic
        class="grid-cols-1"
        :icon="faStopwatch"
        title="Node Latency"
        body="24 ms"
      />
      <card-statistic
        class="grid-cols-1"
        :icon="faSyncAlt"
        title="Panel Version"
        :body="version"
      />
    </div>
  </app-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import CardStatistic from '@components/CardStatistic.vue'
import { faSyncAlt, faHeartbeat, faStopwatch, faLayerGroup } from '@fortawesome/free-solid-svg-icons'

export default defineComponent({
  name: 'Dashboard',
  props: {
    server_count: Number,
    version: String,
  },
  components: { AppLayout, CardStatistic },
  setup() {
    return { faSyncAlt, faHeartbeat, faStopwatch, faLayerGroup }
  },
})
</script>
