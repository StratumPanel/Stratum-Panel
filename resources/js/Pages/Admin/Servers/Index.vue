<template>
  <app-layout>
    <Card class="mt-2 overflow-x-hidden">
      <Table :headers="headers" :items="servers.data">
        <template
            v-slot:actions="{
              item,
            }: {
              item: {
                id: number
              }
            }"
          >
            <div class="flex space-x-1">
              <icon-button :icon="faPencilAlt" :href="route('admin.servers.edit', item.id)" />
            </div>
          </template>
      </Table>
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
import { faPencilAlt } from '@fortawesome/free-solid-svg-icons'
import IconButton from '@components/IconButton.vue'

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
  {
    text: '',
    value: 'actions',
  }
]

const { servers } = defineProps<{
  servers: PaginationReturns<Server>
}>()
</script>
