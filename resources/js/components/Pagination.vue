<template>
  <nav class="relative" aria-label="Page navigation">
    <ul class="inline-flex -space-x-px">
      <li>
        <Link
          :href="prev_page_url"
          class="py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
          >Previous</Link
        >
      </li>
      <template v-for="link in parsedLinks">
        <li v-if="link.label != current_page">
          <a
            href="#"
            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
            >{{ link.label }}</a
          >
        </li>
        <li v-else-if="link.label == current_page">
          <a
            href="#"
            aria-current="page"
            class="py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700"
            >{{ link.label }}</a
          >
        </li>
      </template>
      <li>
        <Link
          :href="next_page_url"
          class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
          >Next</Link
        >
      </li>
    </ul>
  </nav>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/inertia-vue3';
const { links } = defineProps(['current_page', 'data', 'first_page_url', 'from', 'last_page', 'last_page_url', 'links', 'next_page_url', 'path', 'per_page', 'prev_page_url', 'to', 'total'])

let parsedLinks = [...links]
parsedLinks = parsedLinks.filter(({ label }: { label: string }) => !label.includes('Previous') && !label.includes('Next'))

// @ts-ignore
//console.log({test: props.current_page})
</script>
