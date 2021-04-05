<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: "VButton",
  props: {
    block: Boolean,
    disabled: Boolean,
  },
});
</script>

<template>
  <button
    :class="{
      'w-full flex justify-center': block,
      'hover:bg-primary-700 focus:ring-2 focus:ring-offset-2 focus:ring-primary-500': !disabled,
      'opacity-50': disabled
    }"
    class="group relative py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 focus:outline-none"
  >
    <slot>Button</slot>
  </button>
</template>
