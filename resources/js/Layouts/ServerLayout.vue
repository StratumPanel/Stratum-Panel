<template>
  <app-layout>
    <template #header>
      <server-header :server="server" />
    </template>

    <div class="flex flex-col space-y-6 md:grid md:!space-y-0 md:gap-6 md:grid-cols-4">
      <server-nav class="col-span-1" :server="server" />

      <div class="col-span-3 inset-0 border border-gray-200 rounded-md py-3">
        <div :class="[ !keeptitle ? 'hidden md:block' : '']" class="border-b border-gray-200 pb-3 px-3 md:px-5 mb-3">
          <p class="font-medium"><slot name="title"></slot></p>
        </div>

        <div class="px-3 md:px-5">
          <slot :server="server" name="main"></slot>
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
    keeptitle: {
      type: Boolean,
      required: false,
    }
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