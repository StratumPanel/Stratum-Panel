<template>
  <app-layout>
    <template #header>
      <nested-tabs :links="nestedLinks" />
    </template>

    <slot name="main"></slot>
  </app-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import NestedTabs from '@components/NestedTabs.vue'

export default defineComponent({
  name: 'AdminLayout',
  props: {
      nestedLinks: {
          type: Object,
          required: false,
      },
  },
  components: {
    AppLayout,
    NestedTabs,
  },
  setup() {},
})
</script>
