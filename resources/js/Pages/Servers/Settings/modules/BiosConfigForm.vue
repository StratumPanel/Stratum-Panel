<template>
  <form-section @submitted="handle">
    <template #root>
      <overlay v-if="!props.server.cloud_init_enabled" center><p>Cloudinit is not enabled</p></overlay>
    </template>
    <template #title> BIOS Configuration </template>
    <template #form>

      <div class="col-span-6 space-y-2">
        <Label value="BIOS Type" />
        <Radio id="ovmf-type" name="bios-type" value="ovmf" v-model="form.type">OVMF</Radio>
        <Radio id="seabios-type" name="bios-type" value="seabios" v-model="form.type">SeaBIOS</Radio>
        <InputError :message="form.errors.type" class="mt-2" />
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
import Radio from '@components/Radio.vue'
import Overlay from '@components/Overlay.vue'

export default defineComponent({
  name: 'BiosConfigForm',
  components: {
    FormSection,
    Label,
    Input,
    InputError,
    Button,
    ActionMessage,
    Radio,
    Overlay,
  },
  setup() {
    const props = usePage().props.value
    const store = useStore()
    const form = useForm({
      type: props.config.bios,
    })

    const handle = () => {
      store.dispatch('alerts/createAlert', {
        message: 'Updating BIOS info...',
        timeout: false,
      })

      form.put(route('servers.show.settings.bios.update', props.server.id), {
        onSuccess: () => {
          store.dispatch('alerts/createAlert', {
            message: 'BIOS info updated',
            icon: faCheck,
          })
        },
        onError: () => {
          store.dispatch('alerts/createAlert', {
            message: 'Failed to update BIOS info',
            icon: faTimes,
          })
        }
      })
    }

    return { form, handle, props }
  },
})
</script>
