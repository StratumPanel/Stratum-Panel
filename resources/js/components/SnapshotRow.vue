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
        <div class="hidden sm:block grid place-items-center">
          <h2 class="text-gray-700 font-bold text-lg break-words">
            {{ creationDate }}
          </h2>
          <p class="text-sm break-words text-gray-600">Created</p>
        </div>

        <button @click="open = true" class="p-2 mr-4 ml-4 text-gray-600 hover:text-gray-800 transition-colors">
            <font-awesome-icon :icon="faHistory" />
        </button>

         <button class="p-2 text-gray-600 hover:text-red-800 transition-colors">
            <font-awesome-icon :icon="faTrashAlt" />
        </button>

      </template>
    </div>
  </div>

  <TransitionRoot as="template" :show="open">
    <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto" @close="open = false">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
          <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
        </TransitionChild>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                  <font-awesome-icon :icon="faExclamationTriangle" class="h-6 w-6 text-red-600" aria-hidden="true" />
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                  <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                    Rollback to <span class="font-bold">{{ snapshot.name }}</span>?
                  </DialogTitle>
                  <div class="mt-2">
                    <p class="text-sm text-gray-500">
                      Rolling back to an older state of the server can result in unintended consequences if not done properly. Make sure your important files are backed up before rolling back.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false">
                Rollback
              </button>
              <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false" ref="cancelButtonRef">
                Cancel
              </button>
            </div>
          </div>
        </TransitionChild>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script lang="ts">
import { computed, defineComponent, ref } from 'vue'
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faArchive, faMapMarkerAlt, faHistory, faTrashAlt, faExclamationTriangle } from '@fortawesome/free-solid-svg-icons'
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
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
  },
  setup(props) {
    const creationDate = computed(() => {
      let { month, day } = DateTimeCalculator(props.snapshot.snaptime)

      return `${month} ${day}`
    })
    const open = ref(false)

    return { faArchive, faMapMarkerAlt, faTrashAlt, faHistory, faExclamationTriangle, open, creationDate }
  },
})
</script>
