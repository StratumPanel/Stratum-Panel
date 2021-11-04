<template>
  <setting-container
    :icon="faBolt"
    title="Power Options"
    description="Send commands to manage the state of your instance."
  >
    <template #actions>
      <setting-link
        @clicked="handlePowerActions(statusActions[powerState])"
        :items="powerOptions"
        dropdown
        >{{ statusActions[powerState] }}</setting-link
      >
    </template>
  </setting-container>
</template>

<script lang="ts">
import { defineComponent, computed } from 'vue'
import { useStore } from 'vuex'
import SettingLink from '@components/SettingLink.vue'
import SettingContainer from '@components/SettingContainer.vue'
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

export default defineComponent({
  name: 'PowerSetting',
  components: {
    SettingLink,
    SettingContainer,
  },
  setup() {
    const store = useStore()
    const server = usePage().props.value.server
    const powerState = computed(() => store.state.serverStatus.state)

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

      editPowerState(server.id, action)
        .then(() => {
          store.dispatch('alerts/createAlert', {
            message: `Sent ${action} command`,
            icon: faCheck,
          })
        })
        .catch((err) => {
          console.log(err)

          store.dispatch('alerts/createAlert', {
            message: 'Command failed. Check console',
            icon: faTimes,
          })
        })
    }

    return {
      faBolt,
      handlePowerActions,
      statusActions,
      powerOptions,
      powerState,
    }
  },
})
</script>
