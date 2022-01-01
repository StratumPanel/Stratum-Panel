<template>
  <admin-layout :nestedLinks="nestedLinks">
    <template #main>
      <Card>
        <Table :headers="headers" :items="nodes">

          <template v-slot:hostname="{ item }">
            {{ `${item.hostname}:${item.port}` }}
          </template>
        </Table>
      </Card>
    </template>
  </admin-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import nestedLinks from './nestedLinks'
import Table from '@components/Table.vue'
import Card from '@components/Card.vue'

export default defineComponent({
  name: 'Index',
  props: {
    nodes: {
      type: Array,
      required: false,
    }
  },
  components: { AdminLayout, Table, Card },
  setup() {
    const headers = [
      {
        text: 'Node',
        value: 'name',
      },
      {
        text: 'Cluster',
        value: 'cluster'
      },
      {
        text: 'Address',
        value: 'hostname',
      }
    ]

    return { nestedLinks, headers }
  },
})
</script>
