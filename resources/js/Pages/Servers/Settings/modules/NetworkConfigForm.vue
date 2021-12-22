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

      <div v-for="(v, i) in nameservers.store" :key="v" class="col-span-6">
        <Label :for="`nameserver-${i}`" :value="`Nameserver ${i}`" />
        <Input
          :id="`nameserver-${i}`"
          type="text"
          class="mt-1 block w-full"
          v-model="v.address"
          :autocomplete="`nameserver-${i}`"
        />
        <InputError :message="form.errors.nameservers" class="mt-2" />
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
import { defineComponent, reactive, computed } from 'vue'
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
    const nameservers = {
      store: reactive({
        1: { address: '' },
        2: { address: '' },
      }),
      output: computed(() => {
        let output: string[] = []

        Object.values(nameservers.store).forEach((val) => {
          output.push(val.address)
        })

        return output
      })
    }

    const form = useForm({
      hostname: 'example.performave.com',
      nameservers: nameservers.output,
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
        },
      })
    }

    return { server, form, handle, nameservers }
  },
})
</script>
