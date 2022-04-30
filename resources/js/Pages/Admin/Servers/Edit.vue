<template>
  <app-layout>
    <h1>{{ server.name }}</h1>

    <div class="grid gap-4 md:grid-cols-3">
      <display-info-form />
      <bios-config-form />
      <network-config-form />
      <password-form />
      <change-ownership-form />
    </div>
  </app-layout>
</template>

<script setup lang="ts">
import { Server } from '@/util/paginationTypes'
import AppLayout from '@layouts/AppLayout.vue'
import DisplayInfoForm from '@pages/Servers/Settings/modules/DisplayInfoForm.vue'
import BiosConfigForm from '@pages/Servers/Settings/modules/BiosConfigForm.vue'
import NetworkConfigForm from '@pages/Servers/Settings/modules/NetworkConfigForm.vue'
import PasswordForm from '@pages/Servers/Security/modules/PasswordForm.vue'
import ChangeOwnershipForm from '@pages/Admin/Servers/modules/ChangeOwnershipForm.vue'

const { server } = defineProps<{
  server: Server
}>()
</script>
