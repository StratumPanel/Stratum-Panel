<template>
  <form @submit.prevent="$emit('submitted')">
    <div
      class="p-4 bg-white shadow"
      :class="
        hasActions ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md'
      "
    >
      <h3 class="text-lg mb-3 font-medium text-gray-900">
        <slot name="title"></slot>
      </h3>

      <p class="mt-1 text-sm text-gray-600">
        <slot name="description"></slot>
      </p>

      <div class="grid grid-cols-6 gap-6">
        <slot name="form"></slot>
      </div>
    </div>

    <div
      class="
        flex
        items-center
        justify-end
        px-4
        py-3
        bg-gray-50
        text-right
        sm:px-6
        shadow
        sm:rounded-bl-md sm:rounded-br-md
      "
      v-if="hasActions"
    >
      <slot name="actions"></slot>
    </div>
  </form>
</template>

<script>
import JetSectionTitle from '@/Jetstream/SectionTitle.vue'

export default {
  emits: ['submitted'],

  components: {
    JetSectionTitle,
  },

  computed: {
    hasActions() {
      return !!this.$slots.actions
    },
  },
}
</script>
