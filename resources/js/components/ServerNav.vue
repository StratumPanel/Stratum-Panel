<template>
  <div class="inset-0 border border-gray-200 rounded-md py-3">
    <div class="border-b border-gray-200 pb-3 px-5 mb-3">
      <!-- after:block after:h-[0.5px] after:bottom-0 after:relative after:w-full after:bg-gray-200 -->
      <h1 class="font-medium">Server Settings</h1>
    </div>
    <div class="flex flex-col">
      <nav-link
        v-for="link in links"
        :key="link.name"
        :href="route(link.route, server.id)"
        class="
          flex
          items-center
          border-l-2
          bg-transparent
          border-transparent
          px-5
          py-2
          hover:bg-gray-50
          hover:border-gray-300
          transition-colors
        "
        :class="{ '!bg-gray-100 !border-gray-800': route().current(link.route) }"
      >
        <font-awesome-icon
          :icon="link.icon"
          class="mr-2 text-lg"
        ></font-awesome-icon>
        <span class="text-navlabel">{{ link.name }}</span>
      </nav-link>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import NavLink from '@components/NavLink.vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faCog, faShieldAlt } from '@fortawesome/free-solid-svg-icons'

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
