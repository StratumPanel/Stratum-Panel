<template>
  <admin-layout :nestedLinks="nestedLinks">
    <template #main>
      <div class="flex justify-end">
        <Button
          type="button"
          class="tracking-widest uppercase"
          @click="showCreateNode = true"
          >Create Node</Button
        >
      </div>

      <Card class="mt-2 overflow-x-hidden">
        <Table :headers="headers" :items="nodes">
          <template
            v-slot:hostname="{ item }: { item: {
            hostname: string
            port: number
          }}"
          >
            {{ `${item.hostname}:${item.port}` }}
          </template>

          <template
            v-slot:actions="{
              item,
            }: {
              item: {
                id: number,
                name: string,
                cluster: string,
                hostname: string,
                port: string,
                username: string,
                password: string,
              },
            }"
          >
            <div class="flex space-x-1">
              <icon-button :icon="faPencilAlt" @click="setNodeAndOpen(item)" />
              <icon-button :icon="faTrash" @click="deleteNodeAction(item.id)" />
            </div>
          </template>
        </Table>
      </Card>

      <dialog-modal :show="showCreateNode" @close="createNode">
        <template #content>
          <div class="!bg-gray-100 dialog-icon">
            <font-awesome-icon
              :icon="faServer"
              class="h-6 w-6 text-gray-600"
              aria-hidden="true"
            />
          </div>

          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <DialogTitle
              as="h3"
              class="text-lg leading-6 font-medium text-gray-900"
            >
              Create Node
            </DialogTitle>
            <p class="text-sm mt-2 text-gray-500">
              A node is the server where Proxmox is hosted and can manage many
              servers.
            </p>

            <div class="mt-4">
              <form
                class="flex flex-col space-y-6"
                @keyup.enter="createNode(true)"
                @submit.prevent="createNode(true)"
              >
                <div>
                  <Label for="node-display-name" value="Display Name" />
                  <Input
                    type="text"
                    id="node-display-name"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    autocomplete="node-display-name"
                  />
                  <InputError :message="form.errors.name" class="mt-2" />
                </div>

                <div>
                  <Label for="node-cluster" value="Name Indicated In Proxmox" />
                  <Input
                    type="text"
                    id="node-cluster"
                    class="mt-1 block w-full"
                    v-model="form.cluster"
                    autocomplete="node-cluster"
                  />
                  <InputError :message="form.errors.cluster" class="mt-2" />
                </div>

                <div>
                  <Label for="node-hostname" value="Hostname" />
                  <Input
                    type="text"
                    id="node-hostname"
                    class="mt-1 block w-full"
                    v-model="form.hostname"
                    autocomplete="node-hostname"
                  />
                  <InputError :message="form.errors.hostname" class="mt-2" />
                </div>

                <div>
                  <Label for="node-port" value="Port" />
                  <Input
                    type="text"
                    id="node-port"
                    class="mt-1 block w-full"
                    v-model="form.port"
                    autocomplete="node-port"
                  />
                  <InputError :message="form.errors.port" class="mt-2" />
                </div>

                <div>
                  <Label for="node-username" value="Username" />
                  <Input
                    type="text"
                    id="node-username"
                    class="mt-1 block w-full"
                    v-model="form.username"
                    autocomplete="node-username"
                  />
                  <InputError :message="form.errors.username" class="mt-2" />
                </div>

                <div>
                  <Label for="node-password" value="Password" />
                  <Input
                    type="password"
                    id="node-password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    autocomplete="node-password"
                  />
                  <InputError :message="form.errors.password" class="mt-2" />
                </div>
              </form>
            </div>
          </div>
        </template>
        <template #footer>
          <Button class="primary-dialog-btn" @click="createNode(true)">
            Create
          </Button>

          <Button class="secondary-dialog-btn" @click="createNode(false)">
            Cancel
          </Button>
        </template>
      </dialog-modal>

      <dialog-modal :show="showEditNode" @close="editNode">
        <template #content>
          <div class="!bg-gray-100 dialog-icon">
            <font-awesome-icon
              :icon="faServer"
              class="h-6 w-6 text-gray-600"
              aria-hidden="true"
            />
          </div>

          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <DialogTitle
              as="h3"
              class="text-lg leading-6 font-medium text-gray-900"
            >
              Edit Node
            </DialogTitle>
            <p class="text-sm mt-2 text-gray-500">
              A node is the server where Proxmox is hosted and can manage many
              servers.
            </p>

            <div class="mt-4">
              <form
                class="flex flex-col space-y-6"
                @keyup.enter="editNode(true)"
                @submit.prevent="editNode(true)"
              >
                <div>
                  <Label for="node-display-name" value="Display Name" />
                  <Input
                    type="text"
                    id="node-display-name"
                    class="mt-1 block w-full"
                    v-model="editForm.name"
                    autocomplete="node-display-name"
                  />
                  <InputError :message="editForm.errors.name" class="mt-2" />
                </div>

                <div>
                  <Label for="node-cluster" value="Name Indicated In Proxmox" />
                  <Input
                    type="text"
                    id="node-cluster"
                    class="mt-1 block w-full"
                    v-model="editForm.cluster"
                    autocomplete="node-cluster"
                  />
                  <InputError :message="editForm.errors.cluster" class="mt-2" />
                </div>

                <div>
                  <Label for="node-hostname" value="Hostname" />
                  <Input
                    type="text"
                    id="node-hostname"
                    class="mt-1 block w-full"
                    v-model="editForm.hostname"
                    autocomplete="node-hostname"
                  />
                  <InputError
                    :message="editForm.errors.hostname"
                    class="mt-2"
                  />
                </div>

                <div>
                  <Label for="node-port" value="Port" />
                  <Input
                    type="text"
                    id="node-port"
                    class="mt-1 block w-full"
                    v-model="editForm.port"
                    autocomplete="node-port"
                  />
                  <InputError :message="editForm.errors.port" class="mt-2" />
                </div>

                <div>
                  <Label for="node-username" value="Username" />
                  <Input
                    type="text"
                    id="node-username"
                    class="mt-1 block w-full"
                    v-model="editForm.username"
                    autocomplete="node-username"
                  />
                  <InputError
                    :message="editForm.errors.username"
                    class="mt-2"
                  />
                </div>

                <div>
                  <Label for="node-password" value="Password" />
                  <Input
                    type="password"
                    id="node-password"
                    class="mt-1 block w-full"
                    v-model="editForm.password"
                    autocomplete="node-password"
                  />
                  <InputError
                    :message="editForm.errors.password"
                    class="mt-2"
                  />
                </div>
              </form>
            </div>
          </div>
        </template>
        <template #footer>
          <Button class="primary-dialog-btn" @click="editNode(true)">
            Save
          </Button>

          <Button class="secondary-dialog-btn" @click="editNode(false)">
            Cancel
          </Button>
        </template>
      </dialog-modal>
    </template>
  </admin-layout>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue'
import { faServer } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { useStore } from 'vuex'
import {
  faClock,
  faTimes,
  faCheck,
  faPencilAlt,
  faTrash,
} from '@fortawesome/free-solid-svg-icons'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import nestedLinks from './nestedLinks'
import Table from '@components/Table.vue'
import Card from '@components/Card.vue'
import Button from '@components/Button.vue'
import DialogModal from '@components/DialogModal.vue'
import { DialogTitle } from '@headlessui/vue'
import Input from '@components/Input.vue'
import InputError from '@components/InputError.vue'
import Label from '@components/Label.vue'
import { usePage, useForm } from '@inertiajs/inertia-vue3'
import IconButton from '@components/IconButton.vue'
import deleteNode from '@api/node/deleteNode'
import { Inertia } from '@inertiajs/inertia'

export default defineComponent({
  name: 'Index',
  props: {
    nodes: {
      type: Array,
      required: false,
    },
  },
  components: {
    AdminLayout,
    Table,
    Card,
    Button,
    DialogModal,
    DialogTitle,
    Input,
    InputError,
    Label,
    FontAwesomeIcon,
    IconButton,
  },
  setup() {
    const store = useStore()
    const headers = [
      {
        text: 'Node',
        value: 'name',
      },
      {
        text: 'Cluster',
        value: 'cluster',
      },
      {
        text: 'Address',
        value: 'hostname',
      },
      {
        text: 'Actions',
        value: 'actions',
      },
    ]

    type Form = {
      [key: string]: any
    }

    const showCreateNode = ref(false)
    const showEditNode = ref(false)

    const form: Form = useForm({
      name: '',
      cluster: '',
      hostname: '',
      port: '',
      username: '',
      password: '',
    })

    const editForm: Form = useForm({
      id: 0,
      name: '',
      cluster: '',
      hostname: '',
      port: '',
      username: '',
      password: '',
    })

    const setNodeAndOpen = (NodeInfo: Object) => {
      Object.entries(NodeInfo).forEach(([key, val]) => {
        editForm[key] = val
      })

      showEditNode.value = true
    }

    const deleteNodeAction = (id: number) => {
      store.dispatch('alerts/createAlert', {
        message: 'Deleting Node...',
        icon: faClock,
        timeout: false,
      })

      deleteNode(id)
        .then(() => {
          store.dispatch('alerts/createAlert', {
            message: 'Node deleted',
            icon: faCheck,
          })

          Inertia.reload({ only: ['nodes'] })
        })
        .catch(() => {
          store.dispatch('alerts/createAlert', {
            message: "Couldn't delete node",
            icon: faTimes,
          })
        })
    }

    const editNode = (confirm: Boolean) => {
      if (!confirm) {
        showEditNode.value = false
        editForm.reset()
        return
      }

      store.dispatch('alerts/createAlert', {
        message: 'Saving Node...',
        icon: faClock,
        timeout: false,
      })

      editForm.put(route('admin.nodes.update', editForm.id), {
        preserveScroll: true,
        onSuccess: () => {
          store.dispatch('alerts/createAlert', {
            message: 'Node saved',
            icon: faCheck,
          })

          showEditNode.value = false

          editForm.reset()
        },
        onError: () => {
          store.dispatch('alerts/createAlert', {
            message: "Couldn't save node",
            icon: faTimes,
          })
        },
      })
    }

    const createNode = (confirm: Boolean) => {
      if (!confirm) {
        showCreateNode.value = false
        form.reset()
        return
      }

      store.dispatch('alerts/createAlert', {
        message: 'Creating Node...',
        icon: faClock,
        timeout: false,
      })

      form.post(route('admin.nodes.store'), {
        preserveScroll: true,
        onSuccess: () => {
          store.dispatch('alerts/createAlert', {
            message: 'Node created',
            icon: faCheck,
          })

          showCreateNode.value = false

          form.reset()
        },
        onError: () => {
          store.dispatch('alerts/createAlert', {
            message: "Couldn't create node",
            icon: faTimes,
          })
        },
      })
    }

    return {
      nestedLinks,
      headers,
      showCreateNode,
      setNodeAndOpen,
      createNode,
      showEditNode,
      editForm,
      deleteNodeAction,
      faTrash,
      faServer,
      form,
      faPencilAlt,
      editNode,
    }
  },
})
</script>
