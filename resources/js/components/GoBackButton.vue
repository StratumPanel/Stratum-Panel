<template>
  <button
    @click="goBack"
    class="
      absolute
      grid
      -ml-1
      place-items-center
      h-8
      w-8
      rounded-full
      bg-white
      hover:bg-gray-200
      transition-colors
    "
  >
    <font-awesome-icon
      class="text-gray-700"
      :icon="faArrowLeft"
    ></font-awesome-icon>
  </button>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faArrowLeft } from '@fortawesome/free-solid-svg-icons'

export default defineComponent({
  name: 'GoBackButton',
  components: {
    FontAwesomeIcon,
  },
  setup() {
    const goBack = () => {
        window.history.back()
    }

    return { faArrowLeft, goBack }
  },
})
</script>
