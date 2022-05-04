<template>
  <app-layout>
    <template #header>
      <server-header :server="server" />
    </template>

    <div
      class="flex flex-col space-y-6 md:grid md:!space-y-0 md:gap-6 md:grid-cols-4"
    >
      <server-nav class="col-span-1" :server="server" />

      <div class="col-span-3 inset-0 border border-gray-200 rounded-md py-3">
        <div class="border-b border-gray-200 pb-3 px-3 md:px-5 mb-3">
          <p class="font-medium"><slot name="title"></slot></p>
        </div>

        <div class="px-3 md:px-5">
          <slot :server="server" name="main"></slot>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script setup lang="ts">
// @ts-ignore
import AppLayout from '@/Layouts/AppLayout.vue'
import ServerInterface from '@/util/serverInterface'
import ServerHeader from '@components/ServerHeader.vue'
import ServerNav from '@components/ServerNav.vue'
import { usePage } from '@inertiajs/inertia-vue3'

const server: ServerInterface = usePage().props.value.server as ServerInterface
</script>

<style scoped>
.server-container {
  display: grid;
  gap: 1.5rem;
  grid-template-columns: 1fr 3fr;
}
</style>
