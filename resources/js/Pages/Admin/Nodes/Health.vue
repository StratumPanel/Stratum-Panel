<template>
  <admin-layout :nestedLinks="nestedLinks">
    <template #main>
      <h1>node health</h1>

      <button @click="runTests()">run tests</button>
    </template>
  </admin-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import axios from 'axios'
import nestedLinks from './nestedLinks'

export default defineComponent({
  name: 'Health',
  components: { AdminLayout },
  setup() {
    const runTests = () => {
      axios
        .post(route('admin.nodes.health.test'))
        .then((res) => console.log(res.data))
        .catch((res) => console.log(res.data))
    }

    return { nestedLinks, runTests }
  },
})
</script>
