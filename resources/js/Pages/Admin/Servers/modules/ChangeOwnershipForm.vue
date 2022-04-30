<template>
  <form-section @submitted="handle">
    <template #title>Change Ownership</template>
    <template #form>
      <div class="col-span-6">
        <Autocomplete v-model="selected" :items="people" :filter-items="(query) => filterItems(query)" :display-value="(person) => person.name" />
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

<script setup lang="ts">
import { Ref, ref } from 'vue'
import { useStore } from 'vuex'
import { usePage, useForm } from '@inertiajs/inertia-vue3'
import { faCheck, faTimes } from '@fortawesome/free-solid-svg-icons'
import FormSection from '@components/FormSection.vue'
import ActionMessage from '@/Jetstream/ActionMessage.vue'
import Button from '@components/Button.vue'
import ServerInterface from '@/util/serverInterface'
import Autocomplete from '@components/Autocomplete.vue'

const server: ServerInterface = usePage().props.value.server as ServerInterface
const store = useStore()
const form = useForm({
  type: 'sshkeys',
  password: '',
  password_confirmation: '',
})

const filterItems = (query: string) =>
  query === ''
    ? people
    : people.filter((person) =>
        person.name
          .toLowerCase()
          .replace(/\s+/g, '')
          .includes(query.toLowerCase().replace(/\s+/g, ''))
      )


const people = [
  { id: 1, name: 'Penis Cooper' },
  { id: 2, name: 'Arlene Mccoy' },
  { id: 3, name: 'Devon Webb' },
  { id: 4, name: 'Tom Cook' },
  { id: 5, name: 'Tanya Fox' },
  { id: 6, name: 'Hellen Schmidt' },
]

const selected = ref(people[0])

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
</script>
