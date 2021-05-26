<template>
  <app-layout>
    <h3 class="text-3xl font-medium">All Servers</h3>
    <div class="flex flex-col justify-center mt-10 w-full space-y-3">
      <div
        class="
          bg-gray-100
          p-4
          rounded-md
          w-full
          hover:border-gray-300
          border-2 border-gray-100
        "
      >
        <div class="flex items-center">
          <div
            class="
              flex
              justify-center
              items-center
              h-12
              w-12
              bg-green-200
              rounded-full
              mr-4
            "
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-8 w-8 text-green-700"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                clip-rule="evenodd"
              />
            </svg>
          </div>
          <div>
            <h2 class="text-gray-700 font-bold text-lg break-words">
              Stratum Staging Server
            </h2>
            <p class="text-sm break-words text-gray-600">For where we procrastinate</p>
          </div>
        </div>
      </div>
      <div
        class="
          bg-gray-100
          p-4
          rounded-md
          w-full
          hover:border-gray-300
          border-2 border-gray-100
        "
      >
        <div class="flex items-center">
          <div
            class="
              flex
              justify-center
              items-center
              h-12
              w-12
              bg-red-200
              rounded-full
              mr-4
            "
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-8 w-8 text-red-700"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8 7a1 1 0 00-1 1v4a1 1 0 001 1h4a1 1 0 001-1V8a1 1 0 00-1-1H8z"
                clip-rule="evenodd"
              />
            </svg>
          </div>
          <div>
            <h2 class="text-gray-700 font-bold text-lg break-words">
              Advin Web Services
            </h2>
            <p class="text-sm break-words text-gray-600">shhhh you're not seeing what you're seeing</p>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
export default {
  components: {
    AppLayout,
  },
}
</script>

<style></style>
