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
                <template
                  v-for="(item, itemIdx) in route().current('admin.*')
                    ? adminlinks
                    : clientlinks"
                  :key="item"
                >
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
                    class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
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
                    class="origin-top-right z-50 absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                  >
                    <MenuItem v-slot="{ active }">
                      <nav-link
                        :href="route('profile.show')"
                        :class="[
                          active ? 'bg-gray-100' : 'hover:bg-gray-100',
                          'block px-4 py-2 text-sm text-gray-700',
                        ]"
                        >Profile</nav-link
                      >
                    </MenuItem>

                    <MenuItem
                      v-if="$page.props.user.root_admin"
                      v-slot="{ active }"
                    >
                      <nav-link
                        :href="
                          route().current('admin.*')
                            ? route('dashboard')
                            : route('admin.index')
                        "
                        :class="[
                          active ? 'bg-gray-100' : 'hover:bg-gray-100',
                          'block px-4 py-2 text-sm text-gray-700',
                        ]"
                        >{{
                          route().current('admin.*')
                            ? 'Client Panel'
                            : 'Admin Panel'
                        }}</nav-link
                      >
                    </MenuItem>

                    <div class="border-t border-gray-100"></div>

                    <button
                      @click="logout"
                      class="block w-full text-left focus:ring-0 focus:outline-none px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    >
                      Log Out
                    </button>
                  </MenuItems>
                </transition>
              </Menu>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <DisclosureButton
              class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
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
          <template v-for="item in clientlinks" :key="item.name">
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

        <div class="pt-4 border-t border-gray-700"></div>

        <div class="px-2 pb-3 space-y-1 sm:px-3">
          <nav-link
            v-for="link in userlinks"
            :key="link.name"
            :href="route(link.route)"
            :class="{
              'bg-gray-900 text-white': route().current(link.route),
              'text-gray-300 hover:bg-gray-700 hover:text-white':
                !route().current(link.route),
            }"
            class="block px-3 py-2 rounded-md text-base font-medium"
            >{{ link.name }}</nav-link
          >

          <nav-link
            @click="logout"
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
            >Log Out</nav-link
          >
        </div>
      </DisclosurePanel>
    </Disclosure>
    <main>
      <slot name="header"></slot>
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <slot></slot>
      </div>
    </main>
  </div>
  <Alert :icon="icon" :message="message"></Alert>
</template>

<script>
import { ref, computed } from 'vue'
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
import { Inertia } from '@inertiajs/inertia'
import Alert from '@components/Alert.vue'
import { useStore } from 'vuex'

const clientlinks = [{ name: 'Dashboard', route: 'dashboard' }]
const adminlinks = [
  {
    name: 'Dashboard',
    route: 'admin.index',
  },
  {
    name: 'Nodes',
    route: 'admin.nodes.index',
  },
  {
    name: 'Servers',
    route: 'admin.servers.index',
  },
]

const userlinks = [{ name: 'Profile', route: 'profile.show' }]

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
    Alert,
  },
  setup() {
    const open = ref(false)
    const store = useStore()

    const logout = () => {
      Inertia.post(route('logout'))
    }

    return {
      clientlinks,
      adminlinks,
      userlinks,
      open,
      logout,
      message: computed(() => store.state.alerts.message),
      icon: computed(() => store.state.alerts.icon),
    }
  },
}
</script>
