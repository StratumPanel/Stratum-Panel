<template>
  <setting
    :icon="faBolt"
    title="Power Options"
    description="Send commands to manage the state of your instance."
  >
    <template #actions>
      <setting-link
        @clicked="handlePowerActions(statusActions[powerState])"
        :items="powerOptions"
        :class="{ 'opacity-25': processing }" :disabled="processing"
        dropdown
        >{{ statusActions[powerState] }}</setting-link
      >
    </template>
  </setting>
</template>

<script lang="ts">
import { defineComponent, computed, ref } from 'vue'
import { useStore } from 'vuex'
import SettingLink from '@components/SettingLink.vue'
import Setting from '@components/Setting.vue'
import editPowerState from '@/api/server/editPowerState'
import { usePage } from '@inertiajs/inertia-vue3'
import {
  faCheck,
  faBolt,
  faBan,
  faStop,
  faUndo,
  faTimes,
  faPlay,
} from '@fortawesome/free-solid-svg-icons'
import ServerInterface from '@/util/serverInterface'

export default defineComponent({
  name: 'PowerSetting',
  components: {
    SettingLink,
    Setting,
  },
  setup() {
    const store = useStore()
    const server: ServerInterface = (usePage().props.value.server as ServerInterface)
    const powerState = computed(() => store.state.serverStatus.state)
    const processing = ref(false)

    const powerOptions = [
      {
        name: 'Start',
        icon: faPlay,
        callback: () => handlePowerActions('start'),
      },
      {
        name: 'Shutdown',
        icon: faStop,
        callback: () => handlePowerActions('shutdown'),
      },
      {
        name: 'Kill',
        icon: faBan,
        callback: () => handlePowerActions('kill'),
      },
      {
        name: 'Restart',
        icon: faUndo,
        callback: () => handlePowerActions('restart'),
      },
    ]

    const statusActions: { [index: string]: string } = {
      running: 'restart',
      stopped: 'start',
      error: 'kill',
      querying: 'start',
    }

    const handlePowerActions = (action: string) => {
      store.dispatch('alerts/createAlert', {
        message: `Sending ${action} command`,
        timeout: false,
      })
      processing.value = true

      editPowerState(server.id, action)
        .then(() => {
          store.dispatch('alerts/createAlert', {
            message: `Sent ${action} command`,
            icon: faCheck,
          })
          processing.value = false
        })
        .catch(() => {
          store.dispatch('alerts/createAlert', {
            message: 'Command failed.',
            icon: faTimes,
          })
          processing.value = false
        })
    }

    return {
      faBolt,
      handlePowerActions,
      statusActions,
      powerOptions,
      powerState,
      processing,
    }
  },
})
</script>
