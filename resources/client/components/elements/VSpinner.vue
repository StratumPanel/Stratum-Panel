<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: "VSpinner",
    props: {
      modelValue: {
        type: Boolean,
        default: true
      }
    }
});
</script>

<template>
  <div v-if="modelValue" class="loading"></div>
</template>
