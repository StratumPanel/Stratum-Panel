<template>
  <div class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <div
        class="flex justify-between sm:justify-start items-center sm:space-x-8"
      >
        <div class="flex items-center">
          <div
            class="h-14 w-14 flex justify-center items-center rounded-full mr-4"
            :class="iconState[serverStatus.state].backgroundColor"
          >
            <font-awesome-icon
              :class="iconState[serverStatus.state].textColor"
              :icon="iconState[serverStatus.state].icon"
              size="lg"
            />
          </div>
          <div>
            <h2 class="text-md overflow-ellipsis font-bold text-gray-700">
              {{ server.name }}
            </h2>
            <p class="font-normal text-sm text-gray-600">
              VM_ID: {{ server.vmid }}
            </p>
          </div>
        </div>
        <div class="flex flex-col sm:flex-row sm:space-x-6">
          <usage-box
            name="CPU Usage"
            :data="
              serverStatus.cpu > 5
                ? Math.floor(serverStatus.cpu)
                : serverStatus.cpu
            "
            :icon="faMicrochip"
            percent
          />
          <usage-box
            name="Memory"
            :data="`${serverStatus.mem.size} ${serverStatus.mem.unit}`"
            :unit="`/ ${serverStatus.maxmem.size} ${serverStatus.maxmem.unit}`"
            :icon="faMemory"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, computed, onBeforeUnmount } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { useStore } from 'vuex'
import { Inertia } from '@inertiajs/inertia'
import {
  faPlay,
  faMicrochip,
  faMemory,
} from '@fortawesome/free-solid-svg-icons'
import { usePage } from '@inertiajs/inertia-vue3'
import UsageBox from './UsageBox.vue'
import getStatus, {
  formatBytes,
  iconState,
  refreshTime,
} from '@api/server/getStatus'

export default defineComponent({
  name: 'ServerHeader',
  components: { UsageBox, FontAwesomeIcon },
  props: {
    server: {
      type: Object,
      required: true,
    },
  },
  setup() {
    const store = useStore()
    const server = usePage().props.value.server
    const serverStatus = computed(() => store.state.serverStatus)
    let stillRefreshingStatus = true

    // check if server status matches the current name of the server the user is viewing
    // we don't want to give them the status of a different server
    if (serverStatus.value.id !== server.id) {
      store.dispatch('serverStatus/clearStatus')
    }

    const refreshStatus = () =>
      getStatus(server.id)
        .then(
          ({
            data: {
              data: { status, cpu, mem, maxmem },
            },
          }) => {
            store.dispatch('serverStatus/setStatus', {
              id: server.id,
              state: status,
              cpu: Math.floor(cpu * 10000) / 100,
              mem: formatBytes(mem),
              maxmem: formatBytes(maxmem),
              memUnparsed: {
                mem: mem,
                maxmem: maxmem,
              },
            })

            if (stillRefreshingStatus) setTimeout(refreshStatus, refreshTime)
          }
        )
        .catch(() => {
          store.commit('serverStatus/setState', 'error')

          if (stillRefreshingStatus) setTimeout(refreshStatus, refreshTime)
        })

    refreshStatus() // initial fetch

    onBeforeUnmount(() => {
      stillRefreshingStatus = false
    })

    return {
      serverStatus,
      iconState,
      formatBytes,
      faPlay,
      faMicrochip,
      faMemory,
    }
  },
})
</script>
