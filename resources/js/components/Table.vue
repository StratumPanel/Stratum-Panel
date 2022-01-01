<template>
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th
          v-for="header in headers"
          :key="header.text"
          scope="col"
          class="
            px-6
            py-3
            text-left text-xs
            font-medium
            text-gray-500
            uppercase
            tracking-wider
          "
        >
          {{ header.text }}
        </th>
      </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">
      <tr v-for="item in items" :key="item.name">
        <td v-for="header in headers" :key="header.value" class="px-6 py-4 whitespace-nowrap text-gray-500">
          <slot :item="item" :name="header.value">{{ item[header.value] }}</slot>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'Table',
  props: {
    headers: {
      type: Array,
      required: true,
    },
    items: {
      type: Array,
      required: false,
    },
  },
  setup() {},
})
</script>
