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
      <template v-if="snapshot.snaptime">
        <div class="hidden sm:grid place-items-center">
          <h2 class="text-gray-700 font-bold text-lg break-words">
            {{ creationDate }}
          </h2>
          <p class="text-sm break-words text-gray-600">Created</p>
        </div>

        <button
          @click="showRevertConfirmation = true"
          class="
            p-2
            mr-4
            ml-4
            text-gray-600
            hover:text-gray-800
            transition-colors
          "
        >
          <font-awesome-icon :icon="faHistory" />
        </button>

        <button @click="showDeleteConfirmation = true" class="p-2 text-gray-600 hover:text-red-800 transition-colors">
          <font-awesome-icon :icon="faTrashAlt" />
        </button>
      </template>
    </div>
  </div>

  <confirm-dialog
    v-model="showRevertConfirmation"
    :title="`Rollback to ${snapshot.name}?`"
    description="Rolling back to an older state of the server can result in unintended
          consequences. Make sure your important files are
          backed up before rolling back."
    :action="ServerRevertAction"
  />

  <confirm-dialog
    v-model="showDeleteConfirmation"
    :title="`Permanently delete  ${snapshot.name}?`"
    description="Deleting this snapshot will be permanent and unrecoverable. Please make sure to check before deleting a snapshot."
    :action="DeleteSnapshotAction"
  />
</template>

<script lang="ts">
import { computed, defineComponent, ref } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import {
  faArchive,
  faMapMarkerAlt,
  faHistory,
  faTrashAlt,
} from '@fortawesome/free-solid-svg-icons'
import DateTimeCalculator from '@/util/DateTimeCalculator'
import ConfirmDialog from '@components/ConfirmDialog.vue'

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
    ConfirmDialog,
  },
  setup(props) {
    const creationDate = computed(() => {
      let { month, day } = DateTimeCalculator(props.snapshot.snaptime)

      return `${month} ${day}`
    })

    const showRevertConfirmation = ref(false)
    const showDeleteConfirmation = ref(false)


    const ServerRevertAction = {
      text: 'Rollback',
      classNames: 'bg-red-600 hover:bg-red-700 focus:ring-red-500',
      callback: () => alert('revert successful'),
    }

    const DeleteSnapshotAction = {
      text: 'Delete',
      classNames: 'bg-red-600 hover:bg-red-700 focus:ring-red-500',
      callback: () => alert('Deletion successful'),
    }


    return {
      faArchive,
      faMapMarkerAlt,
      faTrashAlt,
      faHistory,
      ServerRevertAction,
      DeleteSnapshotAction,
      creationDate,
      showRevertConfirmation,
      showDeleteConfirmation,
    }
  },
})
</script>
