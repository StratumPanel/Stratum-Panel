<template>
  <admin-layout :nestedLinks="nestedLinks">
    <template #main>
      <Card>
        <canvas
          class="mt-3"
          ref="uptimeRef"
          aria-label="Node uptime overview graph"
          role="img"
        />
      </Card>
      <button @click="runTests()">run tests</button>
    </template>
  </admin-layout>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted } from 'vue'
import Chart, { ChartConfiguration } from 'chart.js'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import nestedLinks from './nestedLinks'
import runHealthTests from '@api/node/runHealthTests'
import Card from '@components/Card.vue'
import '@/util/RoundedDoughnut'

const uptimeChartConfig: ChartConfiguration = {
  type: 'RoundedDoughnut',
  options: {
    cutoutPercentage: 80,

    legend: {
      display: false,
    },
    tooltips: {
      enabled: false,
    },
  },
  data: {
    datasets: [
      {
        data: [70, 30],
        backgroundColor: ['#3ec556', 'rgb(0,0,0,0)'],
        borderWidth: [0, 0],
      },
    ],
  },
}

export default defineComponent({
  name: 'Health',
  components: { AdminLayout, Card },
  setup() {
    const uptimeRef = ref()
    onMounted(() => {
      const uptimeGraph = ref(
        new Chart(uptimeRef.value.getContext('2d'), uptimeChartConfig)
      )
    })

    const runTests = () => {
      runHealthTests()
        .then((res) => console.log(res.data))
        .catch((res) => console.log(res.data))
    }

    return { nestedLinks, runTests, uptimeRef }
  },
})
</script>
