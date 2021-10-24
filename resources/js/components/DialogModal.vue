<template>
  <modal :show="vshow" @close="close">
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
      <div class="sm:flex sm:items-start">
        <slot class="content"></slot>
      </div>
    </div>

    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
      <slot name="footer"></slot>
    </div>
  </modal>
</template>

<script lang="ts">
import { computed, defineComponent } from 'vue'
import Modal from '@components/Modal.vue'

export default defineComponent({
  name: 'DialogModal',
  props: {
    show: {
      type: Boolean,
      required: true,
    },
  },
  components: {
    Modal,
  },
  setup(props, { emit }) {
    const close = () => {
      emit('close', false)
    }

    const vshow = computed(() => {
      return props.show
    })

    return { close, vshow }
  },
})
</script>
