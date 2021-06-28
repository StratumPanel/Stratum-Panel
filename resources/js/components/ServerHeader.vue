<template>
  <div class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <div class="flex items-center space-x-8">
        <div class="flex items-center">
          <div
            class="
              h-14
              w-14
              flex
              justify-center
              items-center
              rounded-full
              bg-gray-200
              mr-4
            "
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-7 w-7 text-gray-500"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"
              />
            </svg>
          </div>
          <div>
            <h2 class="text-lg font-bold text-gray-700">{{ server.name }}</h2>
            <p class="font-normal text-sm text-gray-600">
              VM_ID: {{ server.proxmoxvmid }}
            </p>
          </div>
        </div>
        <div class="hidden sm:flex space-x-6">
          <usage-box name="CPU Usage" :data="79" percent/>
          <usage-box name="Memory" :data="576" unit="/ 1024 MB" />
          <usage-box name="Procastination" data="Too much"/>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import UsageBox from './UsageBox.vue'

export default defineComponent({
  name: 'ServerHeader',
  components: { UsageBox },
  props: {
    server: {
      type: Object,
      required: true,
    },
  },
  setup() {},
})
</script>
