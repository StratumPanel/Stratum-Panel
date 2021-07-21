<template>
  <div class="inset-0 border border-gray-200 rounded-md py-3">
    <div class="border-b border-gray-200 px-5 pt-2 pb-5 mb-3">
      <p class="font-medium">Server Settings</p>
    </div>
    <div class="flex flex-col">
      <a class="border-l-2 bg-gray-50 border-gray-800 px-5 py-2"
        ><font-awesome-icon :icon="faCog" class="mr-2"></font-awesome-icon> General
      </a>
      
      <a class="border-l-2 border-transparent px-5 py-2 text-gray-500">
        <font-awesome-icon :icon="faCog" class="mr-2"></font-awesome-icon> Backups
      </a>
      
      
      <a class="border-l-2 border-transparent px-5 py-2 text-gray-500">
        <font-awesome-icon :icon="faCog" class="mr-2"></font-awesome-icon> Subscription
      </a>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faCog } from '@fortawesome/free-solid-svg-icons'

export default defineComponent({
  name: 'ServerNav',
  components: {
    FontAwesomeIcon,
  },
  setup() {
    return { faCog }
  },
})
</script>
