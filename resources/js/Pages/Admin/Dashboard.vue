<template>
  <app-layout>
    <div class="grid md:grid-cols-4 gap-5">
      <Card v-for="i in 4" :key="i" class="grid-cols-1">
        <h1>wowow</h1>
      </Card>
    </div>
  </app-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Card from '@components/Card.vue'

export default defineComponent({
  name: 'Dashboard',
  components: { AppLayout, Card },
  setup() {},
})
</script>
