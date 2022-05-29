<template>
  <app-layout>
    <Card class="mt-2 overflow-x-hidden">
      <Table :headers="headers" :items="users.data">
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
              <icon-button :icon="faPencilAlt" :href="route('admin.users.show', item.id)" />
            </div>
          </template>
      </Table>
    </Card>

    <div class="flex mt-8 justify-end">
      <Pagination v-bind="users" />
    </div>
  </app-layout>
</template>

<script setup lang="ts">
import Table from '@components/Table.vue'
import Card from '@components/Card.vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Pagination from '@components/Pagination.vue'
import { PaginationReturns } from '@/util/paginationTypes'
import { faPencilAlt } from '@fortawesome/free-solid-svg-icons'
import IconButton from '@components/IconButton.vue'

export interface User {
    id: number
    name: string
    email: string
    root_admin: boolean
}

const headers = [
  {
    text: 'Name',
    value: 'name',
  },
  {
    text: 'Email',
    value: 'email',
  },
  {
      text: 'Admin User',
      value: 'root_admin'
  },
  {
    text: '',
    value: 'actions',
  }
]

const { users } = defineProps<{
  users: PaginationReturns<User>
}>()
</script>
