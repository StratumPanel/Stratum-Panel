<template>
  <app-layout>
    <template #header>
      <user-header />
    </template>

    <div class="flex flex-col justify-center py-6 w-full space-y-3">
      <template v-if="servers.length === 0">
      <div class="grid place-items-center">

        <font-awesome-icon :icon="faHeartBroken" class="!w-16 !h-16 text-indigo-500" />
        <p class="text-base">Looks like there are no servers</p>
      </div>
      </template>

      <server-row
        v-for="server in servers"
        :key="server.id"
        :id="server.id"
        :name="server.name"
        :description="server.description"
      />
    </div>
  </app-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faHeartBroken } from '@fortawesome/free-solid-svg-icons'

import AppLayout from '@/Layouts/AppLayout.vue'
import ServerRow from '@components/ServerRow.vue'
import UserHeader from '@components/UserHeader.vue'

export default defineComponent({
  name: 'Dashboard',
  components: {
    AppLayout,
    ServerRow,
    UserHeader,
    FontAwesomeIcon,
  },
  props: {
    servers: {
      type: Object,
      required: true,
    },
  },
  setup() {

    return { faHeartBroken }
  },
})
</script>
