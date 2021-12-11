<template>
  <form-section @submitted="updatePassword">
    <template #title>Authentication</template>
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
        <InputError :message="form.errors.password" class="mt-2" /></div
    ></template>
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
import FormSection from '@components/FormSection.vue'
import Label from '@components/Label.vue'
import Input from '@components/Input.vue'
import InputError from '@components/InputError.vue'
import ActionMessage from '@/Jetstream/ActionMessage.vue'
import Button from '@components/Button.vue'

export default defineComponent({
  name: 'UpdatePasswordForm',
  components: {
    FormSection,
    Label,
    Input,
    InputError,
    ActionMessage,
    Button,
  },
  setup() {
    const server = usePage().props.value.server
    const store = useStore()
    const form = useForm({
      type: 'password',
      password: '',
    })

    const updatePassword = () => {
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

    return { updatePassword, form }
  },
})
</script>
