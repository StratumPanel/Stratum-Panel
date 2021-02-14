<template>
  <form @submit.prevent="submit">
    <input type="hidden" name="remember" value="true" />
    <div class="space-y-6">
      <v-text-field
        v-model="state.email"
        name="email"
        type="email"
        label="Email"
        autocomplete="email"
        placeholder="mikerowesoft@outlook.com"
        required
      />

      <v-text-field
        v-model="state.password"
        name="password"
        type="password"
        label="Password"
        autocomplete="password"
        required
      />

      <div class="flex items-center justify-between">
        <v-checkbox 
          v-model="rememberMe"
          name="remember_me"
          label="Remember me"
        />

        <div class="text-sm">
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
            Forgot your password?
          </a>
        </div>
      </div>

      <div>
        <button
          type="submit"
          class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          Sign in
        </button>
      </div>
    </div>
  </form>
</template>

<script>
import { defineComponent, watch, ref, reactive } from "vue";
import VTextField from "@client/components/elements/VTextField";
import VCheckbox from "@client/components/elements/VCheckbox";


export default defineComponent({
  name: "LoginForm",
  components: {
    VTextField,
    VCheckbox,
  },
  setup() {
    const state = reactive({
      email: "",
      password: "",
    });
    const rememberMe = ref(false);

    const submit = () => {
      console.log(state.email);
    };

    watch(rememberMe, (old, mod) => {
      console.log("hello!", { old, mod });
    })

    return {
      state,
      rememberMe,
      submit,
    };
  },
});
</script>