<template>
  <Link :href="route('servers.show', { server: id })">
    <div
      class="
        bg-gray-100
        p-2
        md:p-3
        rounded-md
        w-full
        hover:border-gray-300
        border border-gray-100
      "
    >
      <div class="flex items-center">
        <div
          class="flex justify-center items-center h-10 w-10 rounded-full mr-4"
          :class="iconState[serverStatus.status].backgroundColor"
        >
          <font-awesome-icon
            :class="iconState[serverStatus.status].textColor"
            :icon="iconState[serverStatus.status].icon"
            class="!w-4 !h-4"
          />
        </div>
        <div>
          <h2 class="text-gray-700 font-bold text-lg break-words">
            {{ name }}
          </h2>
          <p v-if="description" class="text-sm break-words text-gray-600">
            {{ description }}
          </p>
        </div>
      </div>
    </div>
  </Link>
</template>

<script lang="ts">
import { defineComponent, onBeforeUnmount, reactive } from 'vue'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faPlay } from '@fortawesome/free-solid-svg-icons'

import { Link } from '@inertiajs/inertia-vue3'

import getStatus, { iconState, refreshTime } from '@api/server/getStatus'

export default defineComponent({
  name: 'ServerRow',
  components: {
    Link,
    FontAwesomeIcon,
  },
  props: {
    id: {
      type: Number,
      required: true,
    },
    name: {
      type: String,
      required: true,
    },
    description: {
      type: String,
      required: false,
    },
  },
  setup(props) {
    const serverStatus = reactive({
      status: 'querying',
    })

    let errorCount = 0

    const refreshStatus = () =>
      getStatus(props.id)
        .then(({ data: { data } }) => {
          serverStatus.status = data.status
        })
        .catch(() => {
          errorCount++
        })

    refreshStatus() // initial fetch

    const refreshInterval = setInterval(() => {
      if (errorCount > 2) {
        clearInterval(refreshInterval)
        serverStatus.status = 'error'
        return
      }

      refreshStatus()
    }, 5000)

    onBeforeUnmount(() => {
      clearInterval(refreshInterval)
    })

    return { serverStatus, iconState, faPlay }
  },
})
</script>

<style scoped></style>
