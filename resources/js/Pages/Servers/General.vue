<template>
  <server-layout>
    <template #title>
      General
    </template>

<<<<<<< HEAD
    Something is supposed to be here in general...
=======
    <div class="grid gap-4 grid-cols-3">
      <setting-container
        :icon="faBolt"
        title="Power Options"
        description="Send commands to manage the state of your instance."
      />
      <setting-container
        :icon="faBolt"
        title="Power Options"
        description="Send commands to manage the state of your instance."
      />
      <setting-container
        :icon="faBolt"
        title="Power Options"
        description="Send commands to manage the state of your instance."
      />
    </div>
>>>>>>> parent of 20d4b78 (Added button to setting containers)
  </server-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> parent of 975a61e (Added SettingContainer on frontend)
=======
import SettingContainer from '@components/SettingContainer.vue'
import { faBolt } from '@fortawesome/free-solid-svg-icons'
>>>>>>> parent of 20d4b78 (Added button to setting containers)

>>>>>>> parent of 975a61e (Added SettingContainer on frontend)
export default defineComponent({
  name: 'General',
  components: {
    ServerLayout,
<<<<<<< HEAD
=======
    SettingContainer,
  },
  setup() {
    return { faBolt }
>>>>>>> parent of 20d4b78 (Added button to setting containers)
  },
  setup() {},
})
</script>