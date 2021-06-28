<template>
  <div>
    <h1 class="text-xs text-gray-600"><font-awesome-icon v-if="icon" :icon="icon" size="sm" /> {{ name }}</h1>
    <h2 class="inline-block text-2xl font-bold text-gray-700">{{ data ? data : 'N/A' }}</h2>
    <h3 v-if="unit" class="ml-1 inline-block font-medium text-sm text-gray-700">{{ unit }}</h3>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

export default defineComponent({
  name: 'UsageBox',
  components: { FontAwesomeIcon },
  props: {
    name: {
      type: String,
      required: true,
    },
    data: {
      type: Number,
      required: true,
    },
    percent: {
      type: Boolean,
      required: false,
    },
    unit: {
      type: String,
      required: false,
    },
    icon: {
      type: Object,
      required: false
    }
  },
  setup(props) {
    const data = ref(props.percent ? `${props.data}%` : props.data)

    return {data}
  },
})
</script>
