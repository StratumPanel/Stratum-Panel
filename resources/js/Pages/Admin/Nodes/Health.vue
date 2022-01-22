<template>
  <admin-layout :nestedLinks="nestedLinks">
    <template #main>
      <div class="flex justify-end">
        <Button @click="runTests()">Rerun tests</Button>
      </div>

      <div class="grid gap-6 grid-cols-4 mt-2">
        <Card class="flex flex-col justify-center space-y-4 col-span-1 p-6">
          <p class="text-center font-semibold">Node Status</p>

          <div class="flex justify-center items-center">
            <p class="absolute text-4xl font-bold">
              {{ statusStatistics.percentage }}
              <span class="absolute text-sm">%</span>
            </p>
            <svg
              class="transform -rotate-90"
              viewBox="0 0 128 128"
              width="128"
              height="128"
            >
              <circle
                r="58"
                cx="64"
                cy="64"
                fill="transparent"
                stroke="#eaeaea"
                stroke-width="12"
                stroke-linecap="round"
              />
              <circle
                r="58"
                cx="64"
                cy="64"
                fill="transparent"
                :stroke="
                  statusStatistics.percentage >= 50 ? '#0CCE6B' : '#ef4444'
                "
                stroke-width="12"
                :stroke-dasharray="`calc(${
                  statusStatistics.percentage / 100
                } * 3.1416 * 116) calc(3.1416 * 116)`"
                stroke-linecap="round"
              />
            </svg>
          </div>

          <div class="flex justify-center space-x-2">
            <div class="flex items-center badge text-sm">
              <font-awesome-icon :icon="faArrowUp" class="!w-3 !h-3 mr-1.5" />
              {{ statusStatistics.up }}
            </div>

            <div class="flex items-center badge text-sm">
              <font-awesome-icon :icon="faArrowDown" class="!w-3 !h-3 mr-1.5" />
              {{ statusStatistics.down }}
            </div>
          </div>
        </Card>
      </div>
    </template>
  </admin-layout>
</template>

<script lang="ts">
import { defineComponent, computed } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { Inertia } from '@inertiajs/inertia'
import { useStore } from 'vuex'
import { faArrowUp, faArrowDown } from '@fortawesome/free-solid-svg-icons'
import Button from '@components/Button.vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import nestedLinks from './nestedLinks'
import runHealthTests from '@api/node/runHealthTests'
import Card from '@components/Card.vue'

export default defineComponent({
  name: 'Health',
  props: {
    nodes: {
      type: Object,
      required: true,
    },
  },
  components: { AdminLayout, Card, FontAwesomeIcon, Button },
  setup(props) {
    const store = useStore()

    const runTests = () => {
      let elapsedTime = 0

      const updateMessage = () => {
        elapsedTime++

        store.dispatch('alerts/createAlert', {
          message: `Running tests for ${elapsedTime}s`,
        })
      }

      let stopwatch = setInterval(updateMessage, 1000)

      updateMessage()

      runHealthTests()
        .then((res) => {
          clearInterval(stopwatch)
          store.dispatch('alerts/createAlert', {
            message: 'Tests completed',
          })
          Inertia.reload({ only: ['nodes'] })
        })
        .catch((res) => {
          store.dispatch('alerts/createAlert', {
            message: 'Error completing tests',
          })
          clearInterval(stopwatch)
        })
    }

    const statusStatistics = computed(() => {
      let up = 0
      let down = 0

      props.nodes.forEach((elm: any) => {
        if (
          elm.last_ping_in_minutes !== null &&
          elm.last_ping_in_minutes < 10
        ) {
          up++
        } else {
          down++
        }
      })

      let percentage = Math.ceil((up / props.nodes.length) * 100)

      return { up, down, percentage }
    })

    return { nestedLinks, runTests, faArrowUp, faArrowDown, statusStatistics }
  },
})
</script>
