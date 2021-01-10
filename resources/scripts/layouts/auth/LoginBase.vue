<template>
  <v-app>
      <div class="login-container">
          <v-col class="no-padding" sm="8" md="5" lg="4">
            <v-card
                class="login-card"
                :outlined="isMobile"
                elevation="0"
            >
                <v-fade-transition mode="out-in">
                    <router-view />
                </v-fade-transition>
            </v-card>
          </v-col>
      </div>
  </v-app>
</template>

<script lang="ts">
    import { Component, Vue } from 'vue-property-decorator'

    @Component
    export default class LoginBase extends Vue {
        private isMobile: boolean = window.innerWidth >= 601

        public mounted() 
        {
            window.addEventListener('resize', this.handleResize);
        }

        public handleResize()
        {
            this.isMobile = window.innerWidth >= 601
        }
    }
</script>

<style scoped>
    .login-container {
        height: 100%;
        width: 100%;
        display: grid;
        place-items: center;
    }

    .login-card {
        padding: 16px;
    }

    .no-padding {
        padding: 0;
    }
</style>
