<template>
  <nav aria-label="Page navigation">
    <ul class="inline-flex -space-x-px">
      <li>
        <a
          href="#"
          class="py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
          >Previous</a
        >
      </li>
      <template v-for="link in links">
        <li v-if="link.label.toString() !== props.current_page">
          <a
            href="#"
            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
            >1</a
          >
        </li>
        <li v-else>
          <a
            href="#"
            aria-current="page"
            class="py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
            >3</a
          >
        </li>
      </template>
      <li>
        <a
          href="#"
          class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
          >Next</a
        >
      </li>
    </ul>
  </nav>
</template>

<script setup lang="ts">
import { defineProps } from 'vue'

interface Server {
  cloud_init_enabled: number
  created_at: string
  description: string | null
  id: number
  name: string
  node_id: number
  updated_at: string
  user_id: number
  vmid: number
  vnc_password: string | null
  vnc_username: string | null
}

interface Link {
  url: string | null
  label: string
  active: boolean
}

const props = defineProps<{
  current_page: number
  data: Server[]
  first_page_url: string | null
  from: number
  last_page: number
  last_page_url: string
  links: Link[]
  next_page_url: string | null
  path: string
  per_page: number
  prev_page_url: string | null
  to: number
  total: number
}>()
</script>
