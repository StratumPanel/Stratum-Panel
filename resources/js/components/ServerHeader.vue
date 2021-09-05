<template>
  <div class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between sm:justify-start items-center sm:space-x-8">
        <div class="flex items-center">
          <div
            class="
              h-14
              w-14
              flex
              justify-center
              items-center
              rounded-full
              mr-4
            "
            :class="iconState[serverStatus.status].backgroundColor"
          >
            <font-awesome-icon :class="iconState[serverStatus.status].textColor" :icon="iconState[serverStatus.status].icon" size="lg" />
          </div>
          <div>
            <h2 class="text-md overflow-ellipsis font-bold text-gray-700">{{ server.name }}</h2>
            <p class="font-normal text-sm text-gray-600">
              VM_ID: {{ server.vmid }}
            </p>
          </div>
        </div>
        <div class="flex flex-col sm:flex-row sm:space-x-6">
          <usage-box name="CPU Usage" :data="serverStatus.cpu" :icon="faMicrochip" percent/>
          <usage-box name="Memory" :data="serverStatus.mem.size" :unit="`/ ${serverStatus.maxmem.size} ${serverStatus.maxmem.unit}`" :icon="faMemory" />
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive, onBeforeUnmount } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faPlay, faClock, faStop, faMicrochip, faMemory } from '@fortawesome/free-solid-svg-icons'
import { usePage } from '@inertiajs/inertia-vue3'
import UsageBox from './UsageBox.vue'
import getStatus, { formatBytes } from '@/api/server/getStatus'


interface iconState {
  [index: string]: {
    backgroundColor: string;
    textColor: string;
    icon: any;
  }
}

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
    let serverStatus = reactive({
      status: 'querying',
      cpu: 0,
      mem: { size: 0, unit: 'B' },
      maxmem: { size: 0, unit: 'B' },
    })

    const iconState: iconState = {
      'querying': {
        backgroundColor: 'bg-gray-200',
        textColor: 'text-gray-700',
        icon: faClock,
      },
      'stopped': {
        backgroundColor: 'bg-red-200',
        textColor: 'text-red-700',
        icon: faStop,
      },
      'running': {
        backgroundColor: 'bg-green-200',
        textColor: 'text-green-700',
        icon: faPlay,
      }
    }

    const refreshStatus = () => getStatus(usePage().props.value.server.id).then(({ data: { data } }) => {
      serverStatus.status = data.status
      serverStatus.cpu = Math.floor(data.cpu * 10000) / 100
      serverStatus.mem = formatBytes(data.mem)
      serverStatus.maxmem = formatBytes(data.maxmem)
    })

    const refreshInterval = setInterval(refreshStatus, 1500)

    onBeforeUnmount(() => {
      clearInterval(refreshInterval)
    })

    return { serverStatus, iconState, formatBytes, faPlay, faMicrochip, faMemory }
  },
})
</script>
