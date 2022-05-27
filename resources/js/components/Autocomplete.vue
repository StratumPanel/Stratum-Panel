<template>
  <Combobox :key="rerenderSignal" v-model="selectedItem">
    <div class="relative mt-1">
      <div class="border-gray-300 rounded-md shadow-sm border">
        <ComboboxInput
          class="w-full border-none py-2 pl-3 pr-10 rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:outline-none focus:ring-opacity-50"
          :displayValue="(item) => displayValue(item)"
          @change="search($event)"
          autocomplete="off"
        />
        <ComboboxButton
          class="absolute inset-y-0 right-0 flex items-center pr-2"
        >
          <SelectorIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
        </ComboboxButton>
      </div>
      <TransitionRoot
        leave="transition ease-in duration-100"
        leaveFrom="opacity-100"
        leaveTo="opacity-0"
        @after-leave="query = ''"
      >
        <ComboboxOptions
          class="focus:outline-none absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 sm:text-sm"
        >
          <div
            v-if="filteredItems.length === 0 && query !== ''"
            class="relative cursor-default select-none py-2 px-4 text-gray-700"
          >
            Nothing found.
          </div>

          <ComboboxOption
            v-for="item in filteredItems"
            as="template"
            :key="item.id"
            :value="item"
            v-slot="{ selected, active }"
          >
            <li
              class="relative cursor-default select-none py-2 pl-10 pr-4"
              :class="{
                'bg-gray-600 text-white': active,
                'text-gray-900': !active,
              }"
            >
              <span
                class="block truncate"
                :class="{ 'font-medium': selected, 'font-normal': !selected }"
              >
                {{ displayValue(item) }}
              </span>
              <span
                v-if="selected"
                class="absolute inset-y-0 left-0 flex items-center pl-3"
                :class="{ 'text-white': active, 'text-gray-600': !active }"
              >
                <font-awesome-icon :icon="faCheck" class="!h-4 !w-4" aria-hidden="true" />
              </span>
            </li>
          </ComboboxOption>
        </ComboboxOptions>
      </TransitionRoot>
    </div>
  </Combobox>
</template>

<script setup lang="ts">
import { ref, computed, watch, Ref } from 'vue'
import {
  Combobox,
  ComboboxInput,
  ComboboxButton,
  ComboboxOptions,
  ComboboxOption,
  TransitionRoot,
} from '@headlessui/vue'
import { CheckIcon, SelectorIcon } from '@heroicons/vue/solid'
import { faCheck } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

const emits = defineEmits(['update:modelValue'])

const props = defineProps<{
  modelValue: Array<any> | string
  items: any[]
  displayValue: Function
  filterItems: Function
}>()

const query = ref('')
const rerenderSignal = ref(0)

const selectedItem = ref<string | Array<any>>('')
watch(
  () => props.modelValue,
  (current) => {
    rerenderSignal.value = rerenderSignal.value + 1
    selectedItem.value = current
  }
)
selectedItem.value = props.modelValue

watch(
  () => selectedItem.value,
  (current) => {
    emits('update:modelValue', current)
  }
)

const filteredItems = ref<any[]>([])
watch(
  () => props.items,
  (current) => {
    filteredItems.value = current
  }
)
filteredItems.value = props.items

const search = async (event: Event) => {
  query.value = (event.target as HTMLInputElement).value
  let filtered = await props.filterItems(
    (event.target as HTMLInputElement).value
  )
  filteredItems.value = filtered
}

const log = (...args: any) => {
  console.log(...args)
}
</script>
