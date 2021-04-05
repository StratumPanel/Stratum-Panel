<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: "VOverlay",
  props: {
    modelValue: Boolean,
  },
});
</script>

<template>
  <div class="v-overlay">
    <div :class="{'opacity-40': modelValue, 'opacity-0': !modelValue}" class="v-overlay-bg absolute bg-faded-800 w-full h-full"></div>
    <slot></slot>
  </div>
</template>

<style scoped>
.v-overlay {
  align-items: center;
  border-radius: inherit;
  display: flex;
  justify-content: center;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  pointer-events: none;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1), z-index 1ms;
}

.v-overlay-bg {
    border-radius: inherit;
}
</style>