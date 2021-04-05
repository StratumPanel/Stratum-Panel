<script>
import { defineComponent } from "vue";

import { useModelWrapper } from "@client/utils/modelWrapper";

export default defineComponent({
  name: "VTextField",
  inheritAttrs: false,
  props: {
    name: String,
    label: String,
    modelValue: String,
  },
  setup(props, { emit }) {
    return {
      value: useModelWrapper(props, emit, "modelValue"),
    };
  },
});
</script>

<template>
  <div>
    <label :for="name" class="text-sm">{{ label }}</label>
    <input
      required
      v-bind="$attrs"
      v-model="value"
      :name="name"
      class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm"
    />
  </div>
</template>
