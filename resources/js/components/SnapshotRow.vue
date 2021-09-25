<template>
    <div
      class="
        bg-gray-100
        p-2
        md:p-3
        rounded-md
        w-full
        border border-gray-100
      "
    >
      <div class="flex items-center">
        <div
          class="flex justify-center items-center h-10 w-10 rounded-full mr-4"
        >
          <font-awesome-icon
            :icon="faArchive"
            class="!w-4 !h-4 text-gray-700"
          />
        </div>
        <div>
          <h2 class="text-gray-700 font-bold text-lg break-words">
            {{ name }}
          </h2>
          <p v-if="description" class="text-sm break-words text-gray-600">
            {{ description }}
          </p>
        </div>
      </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faArchive } from '@fortawesome/free-solid-svg-icons'
import DateTimeCalculator from '@/utilities/DateTimeCalculator'

export default defineComponent({
    name: 'SnapshotRow',
    props: {
        name: {
            type: String,
            required: true,
        },
        description: {
            type: String,
            required: false,
        }
    },
    components: {
        FontAwesomeIcon
    },
    setup() {
        return { faArchive }
    },
});
</script>