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

  .row {
    margin: 0 !important;
  }
</style>