import { createApp } from "vue";
import App from "@client/App.vue";
import router from "@client/router";
import store from "@client/store";
import "@client/sass/tailwind.css";

createApp(App)
  .use(store)
  .use(router)
  .mount("#app");
