<template>
  <TransitionRoot as="template" :show="show">
    <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto" @close="close">
      <div
        class="
          flex
          items-end
          justify-center
          min-h-screen
          pt-4
          px-4
          pb-20
          text-center
          sm:block sm:p-0
        "
      >
        <TransitionChild
          as="template"
          enter="ease-out duration-300"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="ease-in duration-200"
          leave-from="opacity-100"
          leave-to="opacity-0"
        >
          <DialogOverlay
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
          />
        </TransitionChild>

        <span
          class="hidden sm:inline-block sm:align-middle sm:h-screen"
          aria-hidden="true"
          >&#8203;</span
        >
        <TransitionChild
          as="template"
          enter="ease-out duration-300"
          enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          enter-to="opacity-100 translate-y-0 sm:scale-100"
          leave="ease-in duration-200"
          leave-from="opacity-100 translate-y-0 sm:scale-100"
          leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
          <div
            class="
              inline-block
              align-bottom
              bg-white
              rounded-lg
              text-left
              overflow-hidden
              shadow-xl
              transform
              transition-all
              sm:my-8 sm:align-middle sm:max-w-lg sm:w-full
            "
          >
            <slot></slot>
          </div>
        </TransitionChild>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script lang="ts">
import { defineComponent, onMounted, onUnmounted } from 'vue'

import {
  Dialog,
  DialogOverlay,
  TransitionChild,
  TransitionRoot,
} from '@headlessui/vue'

export default defineComponent({
  name: 'ConfirmDialog',
  props: {
    show: {
      type: Boolean,
      required: false,
    },
  },
  emits: ['close'],
  components: {
    Dialog,
    DialogOverlay,
    TransitionChild,
    TransitionRoot,
  },

  setup(props, { emit }) {

    const close = () => {
      emit('close', false)
    }


    const closeOnEscape = (e: KeyboardEvent) => {
      if (e.key === 'Escape' && props.show) {
        close()
      }
    }

    onMounted(() => document.addEventListener('keydown', closeOnEscape))
    onUnmounted(() => document.removeEventListener('keydown', closeOnEscape))

    return { close }
  },
})
</script>
