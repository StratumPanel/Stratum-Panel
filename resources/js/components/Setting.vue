<template>
  <setting-container class="flex flex-col justify-between">
    <div>
      <div class="h-12 w-12 shadow-md rounded-full grid place-items-center">
        <font-awesome-icon class="!w-5 !h-5" :icon="icon" />
      </div>
      <h3 class="pt-4 font-bold">{{ title }}</h3>
      <p class="text-sm text-gray-600">{{ description }}</p>
    </div>

    <div class="pt-4">
      <slot name="actions"></slot>
    </div>
  </setting-container>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import SettingContainer from '@components/SettingContainer.vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

export default defineComponent({
  name: 'Setting',
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
    },
  },
  components: { SettingContainer, FontAwesomeIcon },
  setup() {},
})
</script>
