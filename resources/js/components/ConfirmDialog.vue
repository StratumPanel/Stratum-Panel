<template>
  <dialog-container v-bind="$props">
    <div
      class="dialog-icon"
    >
      <font-awesome-icon
        :icon="faExclamationTriangle"
        class="h-6 w-6 text-red-600"
        aria-hidden="true"
      />
    </div>
    <div class="dialog-content-container">
      <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
        {{ title }}
      </DialogTitle>
      <div class="mt-2">
        <p class="text-sm text-gray-500">
          {{ description }}
        </p>
      </div>
    </div>
  </dialog-container>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { DialogTitle } from '@headlessui/vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faExclamationTriangle } from '@fortawesome/free-solid-svg-icons'

import DialogContainer from '@components/DialogContainer.vue'

export default defineComponent({
  name: 'ConfirmDialog',
  props: {
    title: {
      type: String,
      required: true,
    },
    description: {
      type: String,
      required: false,
    },
  },
  components: {
    FontAwesomeIcon,
    DialogTitle,
    DialogContainer,
  },
  setup() {
    return { faExclamationTriangle }
  },
})
</script>
