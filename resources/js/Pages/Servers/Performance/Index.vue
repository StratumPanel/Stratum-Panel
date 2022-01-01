<template>
  <server-layout>
    <template #title> Performance </template>

    <template #main>
      <div class="grid grid-rows-2 grid-cols-1 md:grid-rows-1 md:grid-cols-2 gap-6">
        <Card class="p-7 md:p-3 lg:p-5">
          <h3 class="text-lg font-medium">CPU Usage</h3>
          <canvas
            class="mt-3"
            id="cpu_chart"
            aria-label="Server CPU Usage Graph"
            role="img"
          />
        </Card>

        <Card class="p-7 md:p-3 lg:p-5">
          <h3 class="text-lg font-medium">Memory Usage</h3>
          <canvas
            class="mt-3"
            id="memory_chart"
            aria-label="Server Memory Usage Graph"
            role="img"
          />
        </Card>
      </div>
    </template>
  </server-layout>
</template>

<script lang="ts">
import { defineComponent, ref, watch } from 'vue'
import { useStore } from 'vuex'
import Chart, { ChartConfiguration } from 'chart.js'
import merge from 'deepmerge'
import Card from '@components/Card.vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'
import bytesToMegabytes from '@/util/bytesToMegabytes'

const chartDefaults = (
  ticks?: Chart.TickOptions | undefined
): ChartConfiguration => ({
  type: 'line',
  options: {
    legend: {
      display: false,
    },
    tooltips: {
      enabled: false,
    },
    animation: {
      duration: 0,
    },
    elements: {
      point: {
        radius: 0,
      },
      line: {
        tension: 0.3,
        backgroundColor: 'rgba(99, 102, 241, 0.2)',
        borderColor: '#6366f1',
      },
    },
    scales: {
      xAxes: [
        {
          ticks: {
            display: false,
          },
          gridLines: {
            display: false,
          },
        },
      ],
      yAxes: [
        {
          gridLines: {
            drawTicks: false,
            color: 'rgba(189, 203, 217, .4)',
            zeroLineColor: 'rgba(189, 203, 217, 0.45)',
            zeroLineWidth: 3,
          },
          ticks: merge(ticks || {}, {
            fontSize: 10,
            fontFamily: '"IBM Plex Mono", monospace',
            fontColor: 'rgb(0, 0, 0, .9)',
            min: 0,
            beginAtZero: true,
            maxTicksLimit: 5,
          }),
        },
      ],
    },
  },
  data: {
    labels: Array(20).fill(''),
    datasets: [
      {
        fill: true,
        data: Array(20).fill(0),
      },
    ],
  },
})

export default defineComponent({
  name: 'Index',
  components: { ServerLayout, Card },
  setup() {
    const store = useStore()

    setTimeout(() => {
      const cpuGraph = ref(
        new Chart(
          document.getElementById('cpu_chart'),

          chartDefaults({
            callback: (value) => `${value}%  `,
            suggestedMax: 100,
          })
        )
      )

      const memoryGraph = ref(
        new Chart(
          document.getElementById('memory_chart'),

          chartDefaults({
            callback: (value) => `${value}Mb  `,
            suggestedMax: bytesToMegabytes(
              store.state.serverStatus.memUnparsed.maxmem
            ),
          })
        )
      )

      watch(store.state.serverStatus, (currentValue) => {
        let cpuData = cpuGraph.value.data.datasets[0].data
        cpuData.push(currentValue.cpu)
        cpuData.shift()

        cpuGraph.value.update({ lazy: true })

        let memoryData = memoryGraph.value.data.datasets[0].data

        memoryData.push(bytesToMegabytes(currentValue.memUnparsed.mem))
        memoryData.shift()

        memoryGraph.value.update({ lazy: true })
      })
    }, 500)
  },
})
</script>
