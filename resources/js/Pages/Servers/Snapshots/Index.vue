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
                  v-model="form.name"
                  autocomplete="snapshot-name"
                  @input="validateName"
                />
                <InputError :message="form.errors.name" class="mt-2" />
              </form>
            </div>
          </div>
        </template>
        <template #footer>
          <Button class="primary-dialog-btn" @click="handleSnapshot(true)">
            Create
          </Button>

          <Button class="secondary-dialog-btn" @click="handleSnapshot(false)">
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
import { usePage, useForm } from '@inertiajs/inertia-vue3'
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
      required: true,
    },
  },
  setup() {
    const store = useStore()
    const server = usePage().props.value.server
    const serverId = (server as {id: number}).id
    const showCreateSnapshot = ref(false)
    const validationError = ref('')
    const form = useForm({
      name: '',
    })

    const handleSnapshot = (confirm: Boolean) => {
      if (!confirm) {
        showCreateSnapshot.value = false
        form.reset()
        return
      }

      store.dispatch('alerts/createAlert', {
        message: 'Creating snapshot...',
        icon: faClock,
        timeout: false,
      })

      showCreateSnapshot.value = false

      form.post(route('servers.show.snapshots.create', serverId), {
        preserveScroll: true,
        onSuccess: () => {
          store.dispatch('alerts/createAlert', {
            message: 'Snapshot created',
            icon: faCheck,
          })

          form.reset()
        },
        onError: () => {
          store.dispatch('alerts/createAlert', {
            message: 'Snapshot failed',
            icon: faTimes,
          })

          form.reset()
        },
      })
    }

    const validateName = () => {
      form.name = form.name.replace(/\s+/g, '-')

      if (form.name.search(/^[a-zA-Z0-9-_]+$/) === -1 && form.name.length > 0) {
        form.errors.name =
          'Name can only include alphanumeric characters, dashes, and underscores'
      } else {
        form.errors.name = ''
      }
    }

    return {
      showCreateSnapshot,
      form,
      handleSnapshot,
      faCopy,
      validateName,
      validationError,
    }
  },
})
</script>
