<template>
  <Link :href="route('servers.show', { server: id })">
    <div
      class="bg-gray-100 p-2 md:p-3 rounded-md w-full hover:border-gray-300 border border-gray-100"
    >
      <div class="flex items-center">
        <div
          class="flex flex-none justify-center items-center h-10 w-10 rounded-full mr-4"
          :class="iconState[serverStatus.status].backgroundColor"
        >
          <font-awesome-icon
            :class="iconState[serverStatus.status].textColor"
            :icon="iconState[serverStatus.status].icon"
            class="!w-4 !h-4"
          />
        </div>
        <div class="flex-grow overflow-hidden whitespace-nowrap">
          <h2
            class="text-gray-700 font-bold text-lg break-words overflow-ellipsis overflow-hidden"
          >
            {{ name }}
          </h2>
          <p
            v-if="description"
            class="text-sm break-words whitespace-nowrap overflow-ellipsis overflow-hidden text-gray-600"
          >
            {{ description }}
          </p>
        </div>
        <div class="hidden flex-none sm:flex sm:w-1/3 md:w-1/4 lg:w-1/6">
          <div class="flex-1 flex flex-col items-center">
            <h2 class="text-gray-700 font-bold text-lg break-words">
              <font-awesome-icon class="text-gray-600" :icon="faMicrochip" />
              {{ serverStatus.cpu }}%
            </h2>
          </div>
          <div class="flex-1 flex flex-col items-center">
            <h2 class="text-gray-700 font-bold text-lg break-words">
              <font-awesome-icon :icon="faMemory" />
              {{ `${serverStatus.mem.size} ${serverStatus.mem.unit}` }}
            </h2>
            <p class="text-sm break-words text-gray-600">
              of {{ `${serverStatus.maxmem.size} ${serverStatus.maxmem.unit}` }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </Link>
</template>

<script lang="ts">
import { defineComponent, onBeforeUnmount, reactive } from 'vue'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import {
  faPlay,
  faMicrochip,
  faMemory,
} from '@fortawesome/free-solid-svg-icons'

import { Link } from '@inertiajs/inertia-vue3'

import getStatus, { refreshTime, iconState, formatBytes } from '@api/server/getStatus'

export default defineComponent({
  name: 'ServerRow',
  components: {
    Link,
    FontAwesomeIcon,
  },
  props: {
    id: {
      type: Number,
      required: true,
    },
    name: {
      type: String,
      required: true,
    },
    description: {
      type: String,
      required: false,
    },
  },
  setup(props) {
    const serverStatus = reactive({
      status: 'querying',
      cpu: 0,
      mem: { size: 0, unit: 'B' },
      maxmem: { size: 0, unit: 'B' },
    })

    let errorCount = 0
    let stillRefreshingStatus = true

    const handleRecursiveRefresh = () => {
      if (errorCount > 2) {
        serverStatus.status = 'error'
        return
      }

      setTimeout(refreshStatus, refreshTime)
    }

    const refreshStatus = () =>
      getStatus(props.id)
        .then(
          ({
            data: {
              data: { status, cpu, mem, maxmem },
            },
          }) => {
            serverStatus.status = status
            serverStatus.cpu = Math.floor((cpu * 10000) / 100)
            serverStatus.mem = formatBytes(mem, 0)
            serverStatus.maxmem = formatBytes(maxmem, 0)

            if (stillRefreshingStatus) handleRecursiveRefresh()
          }
        )
        .catch(() => {
          errorCount++

          if (stillRefreshingStatus) handleRecursiveRefresh()
        })

    refreshStatus() // initial fetch

    onBeforeUnmount(() => {
      stillRefreshingStatus = false
    })

    return { serverStatus, iconState, faPlay, faMicrochip, faMemory }
  },
})
</script>
