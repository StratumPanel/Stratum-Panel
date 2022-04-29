<template>
  <transition
    enter-active-class="transition-all ease-in duration-75 transform"
    enter-from-class="translate-y-14"
    enter-to-class="translate-y-0"
    leave-active-class="transition-all ease-in duration-75 transform"
    leave-from-class="translate-y-0"
    leave-to-class="translate-y-14"
  >
    <div
      v-show="show"
      class="
        fixed
        z-50
        inline-block
        bg-gray-800
        px-5
        py-3
        w-full
        bottom-0 md:bottom-3
        md:w-auto md:right-3 md:rounded-md
      "
    >
      <div class="flex space-x-2 items-center">
        <font-awesome-icon
          v-if="cached.icon"
          :icon="cached.icon"
          class="text-white"
        />
        <p class="text-white">{{ cached.message }}</p>
      </div>
    </div>
  </transition>
</template>

<script lang="ts">
import { defineComponent, watch, reactive, ref } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { TransitionRoot } from '@headlessui/vue'

interface CachedInterface {
  icon?: Record<string, any>
  message: string
}

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
  setup(props) {
    const cached = reactive<CachedInterface>({
      icon: undefined,
      message: '',
    })

    const show = ref(false)

    watch(
      () => props.message,
      (current) => {
        if (current.length > 0) {
          // if the message is empty
          show.value = true
          cached.message = current
          cached.icon = props.icon
        }

        if (current.length === 0) {
          show.value = false
        }
      }
    )

    return { cached, show }
  },
})
</script>
