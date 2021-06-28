<template>
  <Link :href="route('servers.show', { server: id })">
    <div
      class="
        bg-gray-100
        p-4
        rounded-md
        w-full
        hover:border-gray-300
        border border-gray-100
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
          <font-awesome-icon class="text-green-700" :icon="faPlay" size="lg" />
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
  </Link>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faPlay } from '@fortawesome/free-solid-svg-icons'

import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  name: 'ServerRow',
  components: {
    Link,
    FontAwesomeIcon,
  },
  props: {
    id: {
      type: Number,
      required: true,
    },
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
    return { faPlay }
  },
})
</script>

<style scoped></style>
