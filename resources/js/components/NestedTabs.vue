<template>
  <div class="bg-gray-100">
    <div class="flex space-x-2 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <inertia-link
        class="py-3 px-3 text-sm"
        :class="{
          'border-b-2 border-gray-800': route().current(link.route),
          'border-b-2 border-transparent hover:border-gray-600 transition-colors text-gray-600': !route().current(
            link.route
          ),
        }"
        v-for="link in links"
        :href="route(link.route)"
        :key="link.name"
        >{{ link.name }}</inertia-link
      >
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'NestedTabs',
  props: {
    links: {
      type: Object,
      required: true,
    },
  },
  setup() {},
})
</script>
