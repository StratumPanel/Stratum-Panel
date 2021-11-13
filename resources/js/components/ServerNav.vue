<template>
  <div>
    <div
      class="
        -mt-4
        md:mt-0
        border-b
        md:border
        border-gray-200
        md:rounded-md md:py-3
      "
    >
      <div
        class="hidden md:block border-b border-gray-200 pb-3 px-3 md:px-5 mb-3"
      >
        <!-- after:block after:h-[0.5px] after:bottom-0 after:relative after:w-full after:bg-gray-200 -->
        <p class="font-medium">Server Settings</p>
      </div>
      <div class="flex flex-row md:flex-col">
        <nav-link
          v-for="link in links"
          :key="link.name"
          :href="route(link.route, server.id)"
          class="
            flex
            items-center
            border-b-2
            md:border-b-0 md:border-l-2
            bg-transparent
            border-transparent
            px-3
            md:px-5
            py-2
            md:hover:bg-gray-50 md:hover:border-gray-300
            transition-colors
          "
          :class="{
            'md:!bg-gray-100 !border-gray-800': route().current(link.route),
          }"
        >
          <font-awesome-icon
            :icon="link.icon"
            class="hidden md:block mr-2 text-lg"
          ></font-awesome-icon>
          <span class="text-navlabel">{{ link.name }}</span>
        </nav-link>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import NavLink from '@components/NavLink.vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faCog, faShieldAlt, faInfoCircle } from '@fortawesome/free-solid-svg-icons'

export default defineComponent({
  name: 'ServerNav',
  components: {
    FontAwesomeIcon,
    NavLink,
  },
  props: {
    server: {
      type: Object,
      required: true,
    },
  },
  setup() {
    const links = [
      { name: 'General', icon: faCog, route: 'servers.show' },
      { name: 'Security', icon: faShieldAlt, route: 'servers.show.security' },
      { name: 'Information', icon: faInfoCircle, route: 'servers.show.settings' },
    ]

    return { links }
  },
})
</script>

<style scoped>
.text-navlabel {
  font-size: 0.9375rem;
}
</style>
