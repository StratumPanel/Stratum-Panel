<template>
  <app-layout>
    <Card class="mt-2 overflow-x-hidden">
      <Table :headers="headers" :items="servers.data"> </Table>
    </Card>

    <div class="flex mt-8 justify-end">
      <Pagination v-bind="servers" />
    </div>
  </app-layout>
</template>

<script setup lang="ts">
import Table from '@components/Table.vue'
import Card from '@components/Card.vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Pagination from '@components/Pagination.vue'
import { PaginationReturns, Server } from '@/util/paginationTypes'

const headers = [
  {
    text: 'Name',
    value: 'name',
  },
  {
    text: 'Node',
    value: 'node_name',
  },
  {
    text: 'User',
    value: 'user_name',
  },
  {
    text: 'VMID',
    value: 'vmid',
  },
]

const { servers } = defineProps<{
  servers: PaginationReturns<Server>
}>()

console.log(servers)
</script>
