<template>
    <div
      v-if="message.length > 0"
      class="
        fixed
        z-50
        inline-block
        bg-gray-800
        px-5
        py-3
        w-full
        bottom-0
        md:w-auto
        md:bottom-3
        md:right-3
        md:rounded-md
      "
    >
      <div class="flex space-x-2 items-center">
        <font-awesome-icon v-if="icon" :icon="icon" class="text-white" />
        <p class="text-white">{{ message }}</p>
      </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { TransitionRoot } from '@headlessui/vue'

export default defineComponent({
  name: 'Alert',
  props: {
    icon: {
      type: Object,
      required: false,
    },
    message: {
      type: String,
      required: true,
    },
  },
  components: {
    FontAwesomeIcon,
    TransitionRoot,
  },
  setup() {},
})
</script>
