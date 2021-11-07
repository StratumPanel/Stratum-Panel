<template>
  <server-layout>
    <template #title>
      <div class="flex items-center">
        <go-back-button />

        <span class="ml-8">Snapshots</span>
      </div>
    </template>

    <template #main>
      <div class="flex justify-end">
        <Button
          type="button"
          class="tracking-widest uppercase"
          @click="showCreateSnapshot = true"
          >Create Snapshot</Button
        >
      </div>
      <div class="flex flex-col space-y-3 py-2">
        <snapshot-row
          v-for="snapshot in snapshots"
          :key="snapshot"
          :snapshot="snapshot"
          :current-snapshot="snapshots[0]"
        />
      </div>

      <dialog-modal :show="showCreateSnapshot" @close="handleSnapshot">
        <template #content>
          <div class="!bg-gray-100 dialog-icon">
            <font-awesome-icon
              :icon="faCopy"
              class="h-6 w-6 text-gray-600"
              aria-hidden="true"
            />
          </div>

          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <DialogTitle
              as="h3"
              class="text-lg leading-6 font-medium text-gray-900"
            >
              Create Snapshot
            </DialogTitle>
            <p class="text-sm mt-2 text-gray-500">
              A snapshot saves the current state of the server while it's still
              running.
            </p>

            <div class="mt-4">
              <form @submit.prevent="handleSnapshot(true)">
                <Label for="snapshot-name" value="Snapshot Name" />
                <Input
                  type="text"
                  id="snapshot-name"
                  class="mt-1 block w-full"
                  ref="snapshot-name"
                  v-model="newSnapshotName"
                  autocomplete="snapshot-name"
                  @input="validateName"
                />
                <InputError :message="validationError" class="mt-2" />
              </form>
            </div>
          </div>
        </template>
        <template #footer>
          <Button
            class="
              w-full
              justify-center
              !text-base
              !font-medium
              sm:ml-3 sm:w-auto sm:!text-sm
            "
            @click="handleSnapshot(true)"
          >
            Create
          </Button>

          <Button
            class="
              mt-3
              w-full
              justify-center
              !text-base
              !font-medium
              !bg-white
              !border-gray-300
              !text-gray-700
              hover:!text-gray-500
              focus:!border-blue-300 focus:!ring-blue-200
              active:!text-gray-800 active:!bg-gray-50
              sm:mt-0 sm:ml-3 sm:w-auto sm:!text-sm
            "
            @click="handleSnapshot(false)"
          >
            Cancel
          </Button>
        </template>
      </dialog-modal>
    </template>
  </server-layout>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue'
import { useStore } from 'vuex'
import {
  faCopy,
  faClock,
  faCheck,
  faTimes,
} from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import ServerLayout from '@/Layouts/ServerLayout.vue'
import GoBackButton from '@components/GoBackButton.vue'
import SnapshotRow from '@components/SnapshotRow.vue'
import Button from '@components/Button.vue'
import DialogModal from '@components/DialogModal.vue'
import { DialogTitle } from '@headlessui/vue'
import Input from '@components/Input.vue'
import InputError from '@components/InputError.vue'
import Label from '@components/Label.vue'
import createSnapshot from '@api/server/snapshots/createSnapshot'
import { usePage } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

export default defineComponent({
  name: 'Index',
  components: {
    ServerLayout,
    GoBackButton,
    SnapshotRow,
    Button,
    FontAwesomeIcon,
    DialogModal,
    DialogTitle,
    Input,
    InputError,
    Label,
  },
  props: {
    snapshots: {
      type: Object,
      required: true,
    },
  },
  setup() {
    const store = useStore()
    const server = usePage().props.value.server
    const showCreateSnapshot = ref(false)
    const newSnapshotName = ref('')
    const validationError = ref('')

    const handleSnapshot = (confirm: Boolean) => {
      if (!confirm) {
        showCreateSnapshot.value = false
        newSnapshotName.value = ''
        return
      }

      store.dispatch('alerts/createAlert', {
        message: 'Creating snapshot...',
        icon: faClock,
        timeout: false,
      })

      showCreateSnapshot.value = false
      createSnapshot(server.id, newSnapshotName.value)
        .then(() => {
          store.dispatch('alerts/createAlert', {
            message: 'Snapshot created',
            icon: faCheck,
          })

          Inertia.reload({ only: ['snapshots'] })
        })
        .catch(() => {
          store.dispatch('alerts/createAlert', {
            message: 'Snapshot failed',
            icon: faTimes,
          })
        })

      newSnapshotName.value = ''
    }

    const validateName = () => {
      newSnapshotName.value = newSnapshotName.value.replace(/\s+/g, '-')

      if (newSnapshotName.value.search(/^[a-zA-Z0-9-_]+$/) === -1 && newSnapshotName.value.length > 0) {
        validationError.value = 'Name can only include alphanumeric characters, dashes, and underscores'
      } else {
        validationError.value = ''
      }
    }

    return {
      showCreateSnapshot,
      newSnapshotName,
      handleSnapshot,
      faCopy,
      validateName,
      validationError,
    }
  },
})
</script>
