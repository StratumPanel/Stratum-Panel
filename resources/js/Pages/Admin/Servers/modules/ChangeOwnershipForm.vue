<template>
  <form-section @submitted="handle">
    <template #title>Change Ownership</template>
    <template #form>
      <div class="col-span-6">
        <Label value="User"></Label>
        <Autocomplete
          v-model="selected"
          :items="users"
          :filter-items="(query: any) => filterItems(query)"
          :display-value="(user: any) => user?.name"
        />
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
// @ts-ignore

import { ref, watch } from 'vue'
import { useStore } from 'vuex'
import { usePage, useForm } from '@inertiajs/inertia-vue3'
import { faCheck, faTimes } from '@fortawesome/free-solid-svg-icons'
import FormSection from '@components/FormSection.vue'
import ActionMessage from '@/Jetstream/ActionMessage.vue'
import Button from '@components/Button.vue'
import ServerInterface from '@/util/serverInterface'
import Autocomplete from '@components/Autocomplete.vue'
import Label from '@components/Label.vue'
import getAllUsers, { User } from '@api/user/getAllUsers'
import { AxiosResponse } from 'axios'
import searchUsers from '@api/user/searchUsers'
import { sendPending, sendError, sendSuccess } from '@/util/sendAlert'
import getUser from '@api/user/getUser'

const server: ServerInterface = usePage().props.value.server as ServerInterface
const store = useStore()
const form = useForm({
  user_id: 0,
})
form.user_id = server.user_id

const users = ref<User[]>([])

const selected = ref<User>()

const filterItems = async (query: string) => {
  let results = await searchUsers(query)

  return Object.values(await results.data)
}

watch(
  () => selected.value,
  (current) => form.user_id = current!.id
)

getAllUsers().then(({ data }: AxiosResponse<User[]>) => {
  users.value = Object.values(data)
})

getUser(server.user_id).then(({ data }: AxiosResponse<User>) => {
  selected.value = data
})

const handle = () => {
  sendPending('Updating owner...')

  form.put(route('admin.servers.update-owner', server.id), {
    onSuccess: () => sendSuccess('Owner updated'),
    onError: () => sendError('Failed to update owner'),
  })
}
</script>
