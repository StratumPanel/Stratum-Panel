<script lang="ts">
import { defineComponent } from "vue";
import { useStore } from "vuex";
import ExtendedWindow from "@client/interfaces/ExtendedWindow";

export default defineComponent({
  name: "App",
  setup() {
    const store = useStore();
    const { StratumUser } = window as ExtendedWindow;

    store.dispatch("user/setUserData", StratumUser);
  },
});
</script>

<template>
  <router-view />
</template>

<style>
@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

.loading {
  border-radius: 50%;
  width: 24px;
  height: 24px;
  border: 0.25rem solid rgba(255, 255, 255, 0.2);
  border-top-color: white;
  -webkit-animation: spin 1s infinite linear;
          animation: spin 1s infinite linear;
}

</style>