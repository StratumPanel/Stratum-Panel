<template>
  <div class="bg-gray-100 p-2 md:p-3 rounded-md w-full border border-gray-100">
    <div class="flex items-center">
      <div class="flex justify-center items-center h-10 w-10 rounded-full mr-4">
        <font-awesome-icon
          :icon="snapshot.running ? faMapMarkerAlt : faArchive"
          class="!w-4 !h-4 text-gray-700"
        />
      </div>
      <div class="flex-grow">
        <h2 class="text-gray-700 font-bold text-lg break-words">
          {{ snapshot.name }}
        </h2>
        <p
          v-if="snapshot.description"
          class="text-sm break-words text-gray-600"
        >
          {{ snapshot.description }}
        </p>
      </div>
      <div v-if="snapshot.snaptime">
        <div class="grid place-items-center">
          <h2 class="text-gray-700 font-bold text-lg break-words">
            {{ creationDate }}
          </h2>
          <p class="text-sm break-words text-gray-600">Created</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { computed, defineComponent } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faArchive, faMapMarkerAlt } from '@fortawesome/free-solid-svg-icons'
import DateTimeCalculator from '@/utilities/DateTimeCalculator'

export default defineComponent({
  name: 'SnapshotRow',
  props: {
    snapshot: {
      type: Object,
      required: true,
    },
  },
  components: {
    FontAwesomeIcon,
  },
  setup(props) {
    const creationDate = computed(() => {
      let { month, day } = DateTimeCalculator(props.snapshot.snaptime)

      return `${month}, ${day}`
    })
    return { faArchive, faMapMarkerAlt, creationDate }
  },
})
</script>
