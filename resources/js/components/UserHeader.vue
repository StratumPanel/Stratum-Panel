<template>
  <div class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <div class="flex items-center">
        <div class="mr-4">
          <img
            class="h-14 w-14 rounded-full"
            :src="$page.props.user.profile_photo_url"
            :alt="$page.props.user.name"
          />
        </div>
        <div>
          <h2 class="text-lg font-bold text-gray-700">{{ $page.props.user.name }}</h2>
          <Link class="font-normal text-sm text-gray-600" href="/user/profile">Manage Account</Link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/inertia-vue3'
</script>
