<template>
  <div class="flex space-x-0.5" v-if="dropdown">
    <inertia-link
      :href="href"
      class="
        block
        flex-grow
        text-center
        px-4
        py-2
        bg-gray-800
        border border-transparent
        rounded-l-md
        font-semibold
        text-xs text-white
        uppercase
        tracking-widest
        hover:bg-gray-700
        active:bg-gray-900
        focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300
        disabled:opacity-25
        transition
      "
    >
      <slot></slot>
    </inertia-link>
    <div>
      <Menu>
        <MenuButton
          class="
            inset-y
            h-full
            px-2
            rounded-r-md
            bg-gray-800
            hover:bg-gray-700
            active:bg-gray-900
            focus:outline-none
            focus:border-gray-900
            focus:ring
            focus:ring-gray-300
          "
        >
          <font-awesome-icon
            class="!w-4 !h-4 text-white"
            :icon="faChevronDown"
          ></font-awesome-icon>
        </MenuButton>
        <transition
          enter-active-class="transition duration-100 ease-out"
          enter-from-class="transform scale-95 opacity-0"
          enter-to-class="transform scale-100 opacity-100"
          leave-active-class="transition duration-75 ease-in"
          leave-from-class="transform scale-100 opacity-100"
          leave-to-class="transform scale-95 opacity-0"
        >
          <MenuItems
            class="
              absolute
              w-56
              mt-2
              origin-top-right
              bg-white
              divide-y divide-gray-100
              rounded-md
              shadow-lg
              ring-1 ring-black ring-opacity-5
              focus:outline-none
            "
          >
            <div class="px-1 py-1">
              <MenuItem v-slot="{ active }">
                <button
                  :class="[
                    active ? 'bg-gray-800 text-white' : 'text-gray-900',
                    'group flex rounded-md items-center w-full px-2 py-2 text-sm',
                  ]"
                >
                  Edit
                </button>
              </MenuItem>
            </div>
          </MenuItems>
        </transition>
      </Menu>
    </div>
  </div>
  <inertia-link
    v-else
    :href="href"
    class="
      block
      text-center
      px-4
      py-2
      bg-gray-800
      border border-transparent
      rounded-md
      font-semibold
      text-xs text-white
      uppercase
      tracking-widest
      hover:bg-gray-700
      active:bg-gray-900
      focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300
      disabled:opacity-25
      transition
    "
  >
    <slot></slot>
  </inertia-link>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faChevronDown } from '@fortawesome/free-solid-svg-icons'
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'

export default defineComponent({
  name: 'SettingLink',
  components: {
    FontAwesomeIcon,
    Menu,
    MenuButton,
    MenuItems,
    MenuItem,
  },
  props: {
    href: {
      type: String,
      required: true,
    },
    dropdown: {
      type: Boolean,
    },
  },
  setup() {
    return { faChevronDown }
  },
})
</script>
