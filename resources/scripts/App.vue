<template>
  <v-fade-transition mode="out-in">
    <router-view />
  </v-fade-transition>
</template>

<script lang="ts">
    import { Component, Vue } from 'vue-property-decorator'

    @Component
    export default class App extends Vue {
    }
</script>

<style>
  body {
    overflow-y: hidden;
  }

  button::-moz-focus-inner {
    border: 0;
  }

  .row {
    margin: 0 !important;
  }
</style>