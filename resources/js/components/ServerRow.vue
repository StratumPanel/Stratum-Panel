<template>
  <div
    class="
      bg-gray-100
      p-4
      rounded-md
      w-full
      hover:border-gray-300
      border-2 border-gray-100
    "
  >
    <div class="flex items-center">
      <div
        class="
          flex
          justify-center
          items-center
          h-12
          w-12
          bg-green-200
          rounded-full
          mr-4
        "
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-8 w-8 text-green-700"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
            clip-rule="evenodd"
          />
        </svg>
      </div>
      <div>
        <h2 class="text-gray-700 font-bold text-lg break-words">
          {{ name }}
        </h2>
        <p v-if="description" class="text-sm break-words text-gray-600">
          {{ description }}
        </p>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'ServerRow',
  props: {
    name: {
      type: String,
      required: true,
    },
    description: {
      type: String,
      required: false,
    },
  },
  setup() {
    return {}
  },
})
</script>

<style scoped></style>
