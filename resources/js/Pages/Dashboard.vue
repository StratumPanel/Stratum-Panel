<template>
  <app-layout>
    <h3 class="text-3xl font-medium">All Servers</h3>
    <div class="flex flex-col justify-center mt-10 w-full space-y-3">
      <server-row name="penis" />
      <server-row name="Test" />
      <server-row name="wow" description="noob" />
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import ServerRow from '@components/ServerRow.vue'

export default {
  components: {
    AppLayout,
    ServerRow
  },
}
</script>