<template>
  <app-layout>
    <template #header>
      <user-header />
    </template>

    <div class="flex flex-col justify-center mt-10 w-full space-y-3">
      <server-row
        v-for="server in servers"
        :key="server.id"
        :id="server.id"
        :name="server.name"
      />
    </div>
  </app-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

import AppLayout from '@/Layouts/AppLayout.vue'
import ServerRow from '@components/ServerRow.vue'
import UserHeader from '@components/UserHeader.vue'

export default defineComponent({
  name: 'Dashboard',
  components: {
    AppLayout,
    ServerRow,
    UserHeader,
  },
  props: {
    servers: {
      type: Object,
      required: true,
    },
  },
  setup() {},
})
</script>
