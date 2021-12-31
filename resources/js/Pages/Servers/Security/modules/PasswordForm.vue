<template>
  <form-section @submitted="handle">
    <template #root>
      <overlay v-if="!server.cloud_init_enabled" center
        ><p>Cloudinit is not enabled</p></overlay
      >
    </template>
    <template #title>SSH Information</template>
    <template #form>
      <div class="col-span-6">
        <Label for="password" value="Password" />
        <Input
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          autocomplete="password"
        />
        <InputError :message="form.errors.password" class="mt-2" />
      </div>

      <div class="col-span-6">
        <Label for="password-confirmation" value="Confirm Password" />
        <Input
          id="password-confirmation"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password_confirmation"
          autocomplete="password"
        />
        <InputError :message="form.errors.password_confirmation" class="mt-2" />
      </div>

      <div class="col-span-6 space-y-2">
        <Label value="Authentication type" />
        <Radio
          id="key-type"
          name="auth-type"
          value="sshkeys"
          v-model="form.type"
          >Key file</Radio
        >
        <Radio
          id="password-type"
          name="auth-type"
          value="cipassword"
          v-model="form.type"
          >Password</Radio
        >
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
import { useStore } from 'vuex'
import { usePage, useForm } from '@inertiajs/inertia-vue3'
import { faCheck, faTimes } from '@fortawesome/free-solid-svg-icons'
import Overlay from '@components/Overlay.vue'
import FormSection from '@components/FormSection.vue'
import Label from '@components/Label.vue'
import Input from '@components/Input.vue'
import InputError from '@components/InputError.vue'
import ActionMessage from '@/Jetstream/ActionMessage.vue'
import Button from '@components/Button.vue'
import Radio from '@components/Radio.vue'

export default defineComponent({
  name: 'PasswordForm',
  components: {
    FormSection,
    Label,
    Input,
    InputError,
    ActionMessage,
    Button,
    Radio,
    Overlay,
  },
  setup() {
    const server = usePage().props.value.server
    const store = useStore()
    const form = useForm({
      type: 'sshkeys',
      password: '',
      password_confirmation: '',
    })

    const handle = () => {
      store.dispatch('alerts/createAlert', {
        message: 'Updating password...',
        timeout: false,
      })

      form.put(route('servers.show.security.password.update', server.id), {
        onSuccess: () => {
          store.dispatch('alerts/createAlert', {
            message: 'Password updated',
            icon: faCheck,
          })
        },
        onError: () => {
          store.dispatch('alerts/createAlert', {
            message: 'Failed to update password',
            icon: faTimes,
          })
        },
      })
    }

    return { handle, form, server }
  },
})
</script>
