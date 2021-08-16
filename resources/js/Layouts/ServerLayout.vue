<template>
  <app-layout>
    <template #header>
      <server-header :server="server" />
    </template>

    <div class="md:grid md:gap-6 md:grid-cols-4">
      <server-nav class="col-span-1" :server="server" />

      <div class="col-span-3 inset-0 border border-gray-200 rounded-md py-3">
        <div class="border-b border-gray-200 pb-3 px-5 mb-3">
          <h1 class="font-medium"><slot name="title"></slot></h1>
        </div>

        <div class="px-5">
          <slot></slot>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script lang="ts">
import AppLayout from '@/Layouts/AppLayout.vue'
import ServerHeader from '@components/ServerHeader.vue'
import ServerNav from '@components/ServerNav.vue'
export default {
  name: 'ServerLayout',
  components: { AppLayout, ServerHeader, ServerNav },
  props: {
    server: {
      type: Object,
      required: true,
    },
  },
  setup() {},
}
</script>