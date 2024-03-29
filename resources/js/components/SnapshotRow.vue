<template>
  <div
    v-if="
      !snapshot.parent ? true : snapshot.running === undefined ? true : false
    "
    class="bg-gray-100 p-2 md:p-3 rounded-md w-full border border-gray-100"
  >
    <div class="flex items-center">
      <div
        class="
          flex flex-none
          justify-center
          items-center
          h-10
          w-10
          rounded-full
          mr-4
        "
      >
        <font-awesome-icon
          :icon="
            snapshot.name === currentSnapshot.parent ||
            currentSnapshot.parent === undefined
              ? faMapMarkerAlt
              : faArchive
          "
          class="!w-4 !h-4 text-gray-700"
        />
      </div>
      <div class="flex-grow overflow-hidden whitespace-nowrap">
        <h2
          class="
            text-gray-700
            font-bold
            text-lg
            overflow-ellipsis overflow-hidden
          "
        >
          {{ snapshot.name }}
        </h2>
        <p class="text-sm break-words text-gray-600">
          {{
            snapshot.name === currentSnapshot.parent
              ? 'Active snapshot'
              : snapshot.description
          }}
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
          Rollback to {{ snapshot.name }}?
        </DialogTitle>
        <div class="mt-2">
          <p class="text-sm text-gray-500">
            Rolling back to an older state of the server can result in
            unintended consequences. Make sure your important files are backed
            up before rolling back.
          </p>
        </div>
      </div>
    </template>
    <template #footer>
      <Button
        class="
          w-full
          justify-center
          !text-white
          focus:!ring-red-300
          sm:ml-3 sm:w-auto sm:!text-sm
          !bg-red-600
          hover:!bg-red-700
        "
        @click="handleRevert(true)"
      >
        Rollback
      </Button>

      <Button
        class="
          mt-3
          w-full
          justify-center
          !bg-white
          !border-gray-300
          !text-gray-700
          hover:!text-gray-500
          focus:!border-blue-300 focus:!ring-blue-200
          active:!text-gray-800 active:!bg-gray-50
          sm:mt-0 sm:ml-3 sm:w-auto sm:!text-sm
        "
        @click="handleRevert(false)"
      >
        Cancel
      </Button>
    </template>
  </dialog-modal>

  <dialog-modal :show="showDeleteConfirmation" @close="handleDelete">
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
          Permanently delete {{ snapshot.name }}?
        </DialogTitle>
        <div class="mt-2">
          <p class="text-sm text-gray-500">
            Deleting this snapshot will be permanent and unrecoverable. Please
            make sure to check before deleting a snapshot.
          </p>
        </div>
      </div>
    </template>
    <template #footer>
      <Button
        class="
          w-full
          justify-center
          !text-white
          focus:!ring-red-300
          sm:ml-3 sm:w-auto sm:!text-sm
          !bg-red-600
          hover:!bg-red-700
        "
        @click="handleDelete(true)"
      >
        Delete
      </Button>

      <Button
        class="
          mt-3
          w-full
          justify-center
          !bg-white
          !border-gray-300
          !text-gray-700
          hover:!text-gray-500
          focus:!border-blue-300 focus:!ring-blue-200
          active:!text-gray-800 active:!bg-gray-50
          sm:mt-0 sm:ml-3 sm:w-auto sm:!text-sm
        "
        @click="handleDelete(false)"
      >
        Cancel
      </Button>
    </template>
  </dialog-modal>
</template>

<script lang="ts">
import { computed, defineComponent, ref } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { useStore } from 'vuex'
import { Inertia } from '@inertiajs/inertia'
import { DialogTitle } from '@headlessui/vue'
import {
  faArchive,
  faMapMarkerAlt,
  faHistory,
  faTrashAlt,
  faCheck,
  faTimes,
  faExclamationTriangle,
} from '@fortawesome/free-solid-svg-icons'
import dateTimeCalculator from '@/util/dateTimeCalculator'
import DialogModal from '@components/DialogModal.vue'
import Button from '@components/Button.vue'
import rollbackSnapshot from '@api/server/snapshots/rollbackSnapshot'
import deleteSnapshot from '@api/server/snapshots/deleteSnapshot'
import { usePage } from '@inertiajs/inertia-vue3'
import ServerInterface from '@/util/serverInterface'

export default defineComponent({
  name: 'SnapshotRow',
  props: {
    snapshot: {
      type: Object,
      required: true,
    },
    currentSnapshot: {
      type: Object,
      required: true,
    },
  },
  components: {
    FontAwesomeIcon,
    DialogModal,
    DialogTitle,
    Button,
  },
  setup(props) {
    const store = useStore()
    const creationDate = computed(() => {
      let { month, day } = dateTimeCalculator(props.snapshot.snaptime)

      return `${month} ${day}`
    })

    const server: ServerInterface = (usePage().props.value.server as ServerInterface)
    const showRevertConfirmation = ref(false)
    const showDeleteConfirmation = ref(false)

    const handleRevert = (confirm: Boolean) => {
      if (!confirm) {
        showRevertConfirmation.value = false
        return
      }

      store.dispatch('alerts/createAlert', {
        message: 'Reverting snapshot...',
        timeout: false,
      })

      showRevertConfirmation.value = false
      rollbackSnapshot(server.id, props.snapshot.name).then(() => {
          store.dispatch('alerts/createAlert', {
            message: 'Snapshot reverted',
            icon: faCheck,
          })

          setTimeout(() => Inertia.reload({ only: ['snapshots'] }), 1000)


      }).catch(() => {
          store.dispatch('alerts/createAlert', {
            message: 'Snapshot failed to revert',
            icon: faTimes,
          })
      })
    }

    const handleDelete = (confirm: Boolean) => {
      if (!confirm) {
        showDeleteConfirmation.value = false
        return
      }

      store.dispatch('alerts/createAlert', {
        message: 'Deleting snapshot...',
        timeout: false,
      })

      showDeleteConfirmation.value = false

      deleteSnapshot(server.id, props.snapshot.name).then(() => {
          store.dispatch('alerts/createAlert', {
            message: 'Snapshot deleted',
            icon: faCheck,
          })

          Inertia.reload({ only: ['snapshots'] })
      }).catch(() => {
          store.dispatch('alerts/createAlert', {
            message: 'Snapshot failed to delete',
            icon: faTimes,
          })
      })
    }

    return {
      faArchive,
      faMapMarkerAlt,
      faTrashAlt,
      faHistory,
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
