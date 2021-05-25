<template>
  <div>
    <Disclosure as="nav" class="bg-gray-800" v-slot="{ open }">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img
                class="h-8 w-8"
                src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"
                alt="Workflow"
              />
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <template v-for="(item, itemIdx) in navigation" :key="item">
                  <nav-link
                    :href="route(item.route)"
                    :class="{
                      'bg-gray-900 text-white': route().current(item.route),
                      'text-gray-300 hover:bg-gray-700 hover:text-white':
                        !route().current(item.route),
                    }"
                    class="px-3 py-2 rounded-md text-sm font-medium"
                    >{{ item.name }}</nav-link
                  >
                </template>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <!-- Profile dropdown -->
              <Menu as="div" class="ml-3 relative">
                <div>
                  <MenuButton
                    class="
                      max-w-xs
                      bg-gray-800
                      rounded-full
                      flex
                      items-center
                      text-sm
                      focus:outline-none
                      focus:ring-2
                      focus:ring-offset-2
                      focus:ring-offset-gray-800
                      focus:ring-white
                    "
                  >
                    <span class="sr-only">Open user menu</span>
                    <img
                      class="h-8 w-8 rounded-full"
                      :src="$page.props.user.profile_photo_url"
                      :alt="$page.props.user.name"
                    />
                  </MenuButton>
                </div>
                <transition
                  enter-active-class="transition ease-out duration-100"
                  enter-from-class="transform opacity-0 scale-95"
                  enter-to-class="transform opacity-100 scale-100"
                  leave-active-class="transition ease-in duration-75"
                  leave-from-class="transform opacity-100 scale-100"
                  leave-to-class="transform opacity-0 scale-95"
                >
                  <MenuItems
                    class="
                      origin-top-right
                      absolute
                      right-0
                      mt-2
                      w-48
                      rounded-md
                      shadow-lg
                      py-1
                      bg-white
                      ring-1 ring-black ring-opacity-5
                      focus:outline-none
                    "
                  >
                    <MenuItem
                      v-for="item in profile"
                      :key="item"
                      v-slot="{ active }"
                    >
                      <a
                        href="#"
                        :class="[
                          active ? 'bg-gray-100' : '',
                          'block px-4 py-2 text-sm text-gray-700',
                        ]"
                        >{{ item }}</a
                      >
                    </MenuItem>
                  </MenuItems>
                </transition>
              </Menu>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <DisclosureButton
              class="
                bg-gray-800
                inline-flex
                items-center
                justify-center
                p-2
                rounded-md
                text-gray-400
                hover:text-white
                hover:bg-gray-700
                focus:outline-none
                focus:ring-2
                focus:ring-offset-2
                focus:ring-offset-gray-800
                focus:ring-white
              "
            >
              <span class="sr-only">Open main menu</span>
              <MenuIcon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
              <XIcon v-else class="block h-6 w-6" aria-hidden="true" />
            </DisclosureButton>
          </div>
        </div>
      </div>

      <DisclosurePanel class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
          <template v-for="(item, itemIdx) in navigation" :key="item">
            <nav-link
              :href="route(item.route)"
              :class="{
                'bg-gray-900 text-white': route().current(item.route),
                'text-gray-300 hover:bg-gray-700 hover:text-white':
                  !route().current(item.route),
              }"
              class="block px-3 py-2 rounded-md text-base font-medium"
              >{{ item.name }}</nav-link
            >
          </template>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700"></div>
      </DisclosurePanel>
    </Disclosure>

    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
      </div>
    </header>
    <main>
      <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="px-4 py-6 sm:px-0">
          <div class="border-4 border-dashed border-gray-200 rounded-lg h-96" />
        </div>
        <!-- /End replace -->
      </div>
    </main>
  </div>
</template>

<script>
import { ref } from 'vue'
import {
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
} from '@headlessui/vue'
import NavLink from '@components/NavLink.vue'
import { BellIcon, MenuIcon, XIcon } from '@heroicons/vue/outline'

const navigation = [{ name: 'Dashboard', route: 'dashboard' }]
const profile = [
  { name: 'Profile', route: 'profile.show' }
]

export default {
  components: {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    BellIcon,
    MenuIcon,
    XIcon,
    NavLink,
  },
  setup() {
    const open = ref(false)

    return {
      navigation,
      profile,
      open,
    }
  },
}
</script>
