<template>
  <div class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between sm:justify-start items-center space-x-8">
        <div class="flex items-center">
          <div
            class="
              h-14
              w-14
              flex
              justify-center
              items-center
              rounded-full
              bg-green-200
              mr-4
            "
          >
            <font-awesome-icon class="text-green-700" :icon="faPlay" size="lg" />
          </div>
          <div>
            <h2 class="text-lg font-bold text-gray-700">{{ server.name }}</h2>
            <p class="font-normal text-sm text-gray-600">
              VM_ID: {{ server.proxmoxvmid }}
            </p>
          </div>
        </div>
        <div class="flex flex-col sm:flex-row sm:space-x-6">
          <usage-box name="CPU Usage" :data="79" :icon="faMicrochip" percent/>
          <usage-box name="Memory" :data="576" unit="/ 1024 MB" :icon="faMemory" />
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faPlay, faMicrochip, faMemory } from '@fortawesome/free-solid-svg-icons'
import UsageBox from './UsageBox.vue'

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
    return { faPlay, faMicrochip, faMemory }
  },
})
</script>
