<template>
  <div class="flex items-center sm:block">
    <div class="block sm:hidden w-3 mr-4" v-if="icon">
      <font-awesome-icon class="text-gray-700" :icon="icon" size="sm" />
    </div>
    <h1 class="hidden sm:block text-sm sm:text-xs text-gray-600">{{ name }}</h1>
    <h2 class="inline-block text-sm sm:text-2xl font-medium sm:font-bold text-gray-600 sm:text-gray-700">{{ data ? data : 'N/A' }}</h2>
    <h3 v-if="unit" class="hidden sm:inline-block ml-1 font-medium text-sm text-gray-600 sm:text-gray-700">{{ unit }}</h3>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, computed } from 'vue'

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
      type: [String, Number],
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
    const data = computed(() => {
      return props.percent ? `${props.data}%` : props.data
    })

    const unit = computed(() => {
      return props.unit
    })
    //ref(props.percent ? `${props.data}%` : props.data)

    return {data, unit}
  },
})
</script>
