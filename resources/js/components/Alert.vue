<template>
  <TransitionRoot
    :show="message.length > 0"
    enter-from="-translate-y-full bottom-0 right-0"
    enter-to="-translate-y-0 bottom-3 right-3"
    leave="-translate-y-0 bottom-3 right-3"
    leave-from="-translate-y-full bottom-0 right-0"
  >
    <div
      class="
        transform
        transition
        fixed
        z-50
        inline-block
        bg-gray-800
        rounded-md
        px-5
        py-3
      "
    >
      <div class="flex space-x-2 items-center">
        <font-awesome-icon v-if="icon" :icon="icon" class="text-white" />
        <p class="text-white">{{ message }}</p>
      </div>
    </div>
  </TransitionRoot>
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
