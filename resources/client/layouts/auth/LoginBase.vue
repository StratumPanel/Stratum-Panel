<template>
  <div
    class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8"
  >
    <div class="max-w-md w-full space-y-8">
      <div>
        <img
          class="mx-auto h-12 w-auto"
          src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
          alt="Workflow"
        />
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Sign in to Stratum
        </h2>
      </div>
      <div class="relative md:bg-white md:rounded-xl md:p-8 md:shadow-md">
        <router-view />
      </div>
    </div>
  </div>
</template>

<script lang="ts">
export default {
  name: "LoginBase",
};
</script>