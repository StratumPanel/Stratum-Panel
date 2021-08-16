<template>
  <app-layout>
    <template #header>
      <server-header :server="server" />
    </template>

    <div class="server-container h-72">
      <server-nav :server="server" />

      <div class="inset-0 border border-gray-200 rounded-md py-3">
        <div class="border-b border-gray-200 pb-3 px-5 mb-3">
          <p class="font-medium"><slot name="title"></slot></p>
        </div>

        <div class="px-5">
          <slot></slot>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
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

<style scoped>
.server-container {
  display: grid;
  gap: 1.5rem;
  grid-template-columns: 1fr 3fr;
}
</style>