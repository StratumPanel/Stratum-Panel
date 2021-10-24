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

        <button
          @click="showDeleteConfirmation = true"
          class="p-2 text-gray-600 hover:text-red-800 transition-colors"
        >
          <font-awesome-icon :icon="faTrashAlt" />
        </button>
      </template>
    </div>
  </div>

  <dialog-modal :show="showRevertConfirmation" @close="handleRevert">
    <template #content>
      <div class="dialog-icon">
        <font-awesome-icon
          :icon="faExclamationTriangle"
          class="h-6 w-6 text-red-600"
          aria-hidden="true"
        />
      </div>

      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
        <DialogTitle
          as="h3"
          class="text-lg leading-6 font-medium text-gray-900"
        >
          Deactivate account
        </DialogTitle>
        <div class="mt-2">
          <p class="text-sm text-gray-500">
            Are you sure you want to deactivate your account? All of your data
            will be permanently removed. This action cannot be undone.
          </p>
        </div>
      </div>
    </template>
    <template #footer> </template>
  </dialog-modal>

  <dialog-modal :show="showDeleteConfirmation" @close="handleDelete">
    <template #content> </template>
    <template #footer> </template>
  </dialog-modal>
</template>

<script lang="ts">
import { computed, defineComponent, watch, ref } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { DialogTitle } from '@headlessui/vue'
import {
  faArchive,
  faMapMarkerAlt,
  faHistory,
  faTrashAlt,
  faExclamationTriangle,
} from '@fortawesome/free-solid-svg-icons'
import DateTimeCalculator from '@/util/DateTimeCalculator'
import DialogModal from '@components/DialogModal.vue'

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
    DialogModal,
    DialogTitle,
  },
  setup(props) {
    const creationDate = computed(() => {
      let { month, day } = DateTimeCalculator(props.snapshot.snaptime)

      return `${month} ${day}`
    })

    const showRevertConfirmation = ref(false)
    const showDeleteConfirmation = ref(false)

    const handleRevert = (confirm: Boolean) => {
      if (!confirm) { // this will only trigger if the user doesn't confirm the actions (e.g. cancel or click out of the modal)
        console.log(showRevertConfirmation.value)
        showRevertConfirmation.value = false
        return
      }
    }


    const handleDelete = (confirm: Boolean) => {
      alert('successful deletion')
    }

    /*   const ServerRevertAction = {
      text: 'Rollback',
      classNames: 'bg-red-600 hover:bg-red-700 focus:ring-red-500',
      callback: () => alert('revert successful'),
    }

    const DeleteSnapshotAction = {
      text: 'Delete',
      classNames: 'bg-red-600 hover:bg-red-700 focus:ring-red-500',
      callback: () => alert('Deletion successful'),
    } */

    return {
      faArchive,
      faMapMarkerAlt,
      faTrashAlt,
      faHistory,
      /*       ServerRevertAction,
      DeleteSnapshotAction, */
      handleRevert,
      handleDelete,
      creationDate,
      showRevertConfirmation,
      showDeleteConfirmation,
      faExclamationTriangle,
    }
  },
})
</script>
