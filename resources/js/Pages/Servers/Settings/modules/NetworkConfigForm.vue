<template>
  <form-section @submitted="handle">
    <template #root>
      <overlay v-if="!server.cloud_init_enabled" center
        ><p>Cloudinit is not enabled</p></overlay
      >
    </template>
    <template #title>Network Configuration</template>
    <template #form>
      <div class="col-span-6">
        <Label for="hostname" value="Hostname" />
        <Input
          id="hostname"
          type="text"
          class="mt-1 block w-full"
          v-model="form.hostname"
          autocomplete="hostname"
        />
        <InputError :message="form.errors.hostname" class="mt-2" />
      </div>
      <div class="col-span-6">
        <Label for="nameserver_1" value="Nameserver 1" />
        <Input
          id="nameserver_1"
          type="text"
          class="mt-1 block w-full"
          v-model="form.nameserver_1"
          autocomplete="nameserver_1"
        />
        <InputError :message="form.errors.nameserver_1" class="mt-2" />
      </div>
      <div class="col-span-6">
        <Label for="nameserver_2" value="Nameserver 2" />
        <Input
          id="nameserver_2"
          type="text"
          class="mt-1 block w-full"
          v-model="form.nameserver_2"
          autocomplete="nameserver_2"
        />
        <InputError :message="form.errors.nameserver_2" class="mt-2" />
      </div>
    </template>
    <template #actions>
      <ActionMessage :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </ActionMessage>

      <Button
        class="uppercase"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
        >Save</Button
      >
    </template>
  </form-section>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { usePage, useForm } from '@inertiajs/inertia-vue3'
import { useStore } from 'vuex'
import { faCheck, faTimes } from '@fortawesome/free-solid-svg-icons'
import FormSection from '@components/FormSection.vue'
import ActionMessage from '@/Jetstream/ActionMessage.vue'
import Label from '@components/Label.vue'
import Input from '@components/Input.vue'
import InputError from '@components/InputError.vue'
import Button from '@components/Button.vue'
import Overlay from '@components/Overlay.vue'

export default defineComponent({
  name: 'NetworkConfigForm',
  components: {
    FormSection,
    Label,
    Input,
    InputError,
    Button,
    ActionMessage,
    Overlay,
  },
  setup() {
    const server = usePage().props.value.server
    const store = useStore()
    const form = useForm({
      hostname: 'example.performave.com',
      nameserver_1: '', // TODO: make this look cleaner (refactor?)
      nameserver_2: '', // looks really ugly
    })

    const handle = () => {
      store.dispatch('alerts/createAlert', {
        message: 'Updating Network Config...',
        timeout: false,
      })

      form.put(route('servers.show.settings.network.update', server.id), {
        onSuccess: () => {
          store.dispatch('alerts/createAlert', {
            message: 'Network config updated',
            icon: faCheck,
          })
        },
        onError: () => {
          store.dispatch('alerts/createAlert', {
            message: 'Failed to update network config',
            icon: faTimes,
          })
        }
      })
    }

    return {server, form, handle}
  },
})
</script>
