<script>
import { defineComponent } from "vue";
import { useModelWrapper } from "@client/utils/modelWrapper";

export default defineComponent({
  name: "VCheckbox",
  inheritAttrs: false,
  props: {
    name: String,
    label: String,
    modelValue: Boolean,
    checked: Boolean,
  },
  setup(props, { emit }) {
    return {
      value: useModelWrapper(props, emit, "modelValue"),
    };
  },
});
</script>

<template>
  <div class="flex items-center">
    <input
      v-model="value"
      :id="name"
      :name="name"
      type="checkbox"
      class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
      :checked="checked"
    />
    <label :for="name" class="ml-2 block text-sm text-gray-900">
      {{ label }}
    </label>
  </div>
</template>
