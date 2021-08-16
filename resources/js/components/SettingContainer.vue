<template>
  <div class="p-4 border border-gray-200 rounded-md">
    <div class="h-12 w-12 shadow-sm rounded-full grid place-items-center">
        <font-awesome-icon class="!w-5 !h-5" :icon="icon" />
    </div>
    <h2 class="pt-4 font-bold">{{ title }}</h2>
    <p class="text-sm text-gray-600">{{ description }}</p>

    <div class="pt-4">
      <slot name="actions"></slot>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

export default defineComponent({
  name: 'SettingContainer',
  props: {
    icon: {
        required: true,
    },
    title: {
      type: String,
      required: true,
    },
    description: {
        type: String,
        required: true,
    }
  },
  components: {
      FontAwesomeIcon
  },
  setup() {},
})
</script>
