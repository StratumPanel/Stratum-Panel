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
import { PaginationReturns } from '@/util/paginationTypes'

const props = defineProps<{
  servers: PaginationReturns
}>()

console.log(props.servers)
</script>
