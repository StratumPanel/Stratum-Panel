<template>
  <div class="bg-gray-100">
    <div class="flex space-x-2 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <Link
        class="py-3 px-3 text-sm"
        :class="{
          'border-b-2 border-gray-800': route().current(link.route),
          'border-b-2 border-transparent hover:border-gray-600 transition-colors text-gray-600':
            !route().current(link.route),
        }"
        v-for="link in links"
        :href="route(link.route)"
        :key="link.name"
        >{{ link.name }}</Link
      >
    </div>
  </div>
</template>

<script setup lang="ts">
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

const { links } = defineProps({
  links: {
    type: Object,
    required: true,
  },
})
</script>
