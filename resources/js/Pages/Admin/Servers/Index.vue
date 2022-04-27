<template>
  <app-layout>
    <h1>test</h1>
    <Pagination v-bind="servers" />
  </app-layout>
</template>

<script setup lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue'
import { defineProps } from 'vue'
import Pagination from '@components/Pagination.vue'

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
  servers: {
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
  }
}>()

console.log(props.servers)
</script>
