<template>
  <form-section @submitted="handle">
    <template #title> Display Info </template>
    <template #form>
      <div class="col-span-6">
        <Label for="name" value="Name" />
        <Input
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.name"
          autocomplete="name"
        />
        <InputError :message="form.errors.name" class="mt-2" />
      </div>
      <div class="col-span-6">
        <Label for="description" value="Description" />
        <Input
          id="description"
          type="text"
          class="mt-1 block w-full"
          v-model="form.description"
          autocomplete="description"
          textarea
        />
        <InputError :message="form.errors.description" class="mt-2" />
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
import ServerInterface from '@/util/serverInterface'

export default defineComponent({
  name: 'DisplayInfoForm',
  components: {
    FormSection,
    Label,
    Input,
    InputError,
    Button,
    ActionMessage,
  },
  setup() {
    const server: ServerInterface = (usePage().props.value.server as ServerInterface)
    const serverId = (server as { id: number }).id
    const store = useStore()
    const form = useForm({
      name: server.name,
      description: server.description,
    })

    const handle = () => {
      store.dispatch('alerts/createAlert', {
        message: 'Updating display info...',
        timeout: false,
      })

      form.put(route('servers.show.settings.display.update', serverId), {
        onSuccess: () => {
          store.dispatch('alerts/createAlert', {
            message: 'Display info updated',
            icon: faCheck,
          })
        },
        onError: () => {
          store.dispatch('alerts/createAlert', {
            message: 'Failed to update display info',
            icon: faTimes,
          })
        }
      })
    }

    return { form, handle }
  },
})
</script>
