<template>
  <span
    v-if="error.length > 0"
    class="block text-center text-white p-2 bg-red-600 rounded-md mb-3"
    >{{ error }}</span
  >
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
        :autofocus="'autofocus'"
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
          <a
            href="#"
            class="font-medium text-primary-600 hover:text-primary-500"
          >
            Forgot your password?
          </a>
        </div>
      </div>

      <div>
        <v-btn type="submit" :disabled="loading" block>
          <v-spinner v-if="loading" class="w-5 h-5 mr-2" />
          <template v-if="!loading">Sign in</template>
        </v-btn>
      </div>
    </div>
  </form>
</template>

<script>
import { defineComponent, ref, reactive } from "vue";
import router from "@client/router";
import { useStore } from "vuex";
import VSpinner from "@client/components/elements/VSpinner.vue";
import VTextField from "@client/components/elements/VTextField.vue";
import VCheckbox from "@client/components/elements/VCheckbox.vue";
import VBtn from "@client/components/elements/VButton.vue";
import login from "@client/api/auth/login";
import getAccountData from "@client/api/account/getAccountData";
import { httpErrorToHuman } from "@client/api/http";

export default defineComponent({
  name: "LoginForm",
  components: {
    VSpinner,
    VTextField,
    VCheckbox,
    VBtn,
  },
  setup() {
    const store = useStore();
    const loading = ref(false);
    const state = reactive({
      email: "",
      password: "",
    });
    const error = ref("");
    const rememberMe = ref(false);

    const submit = () => {
      loading.value = true;
      error.value = "";

      login(state)
        .then(() => {
          // Fetch account information (email, name, etc)
          getAccountData().then((response) => {
            // Dispatch it to store
            store.dispatch("user/setUserData", response);

            // Change the Authenticated state
            store.dispatch("auth/setAuthenticated", true).then(() => {
              // Send the user to the dashboard

              router.push({ name: "Dashboard" });
            });
          });
        })
        .catch((err) => {
          const errors = httpErrorToHuman(err);

          for (const message in errors) {
            error.value = errors[message][0];
            
            break;
          }

          loading.value = false;
        });
    };

    return {
      loading,
      state,
      error,
      rememberMe,
      submit,
    };
  },
});
</script>