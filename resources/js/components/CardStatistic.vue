<template>
  <Card
    class="flex flex-col md:flex-row space-y-2 md:space-x-4 md:space-y-0 p-3"
  >
    <div class="grid md:place-items-center">
      <div class="grid place-items-center p-1 w-8 h-8 rounded-full border border-gray-400 md:p-0 md:border-0">
        <font-awesome-icon class="!w-4 !h-4 md:!w-8 md:!h-8" :icon="icon" />
      </div>
    </div>
    <div>
      <h3 class="text-lg font-bold">{{ title }}</h3>
      <p>{{ body }}</p>
    </div>
  </Card>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import Card from '@components/Card.vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

export default defineComponent({
  name: 'CardStatistic',
  props: {
    icon: {
      type: Object,
      required: true,
    },
    title: {
      type: String,
      required: true,
    },
    body: {
      type: String,
      required: true,
    },
  },
  components: {
    FontAwesomeIcon,
    Card,
  },
  setup() {},
})
</script>
