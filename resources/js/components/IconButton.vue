<template>
  <button
    class="grid place-items-center p-2 rounded-md bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
  >
    <font-awesome-icon class="!w-3 !h-3 text-white" :icon="props.icon" />
  </button>
</template>

<script setup lang="ts">
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

const props = defineProps(['icon'])
</script>
