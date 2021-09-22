<template>
    <server-layout>
        <template #title> Snapshots </template>

        <template #main>

        </template>
    </server-layout>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import ServerLayout from '@/Layouts/ServerLayout.vue'

export default defineComponent({
    name: 'Index',
    components: {
      ServerLayout
    },
    setup() {},
});
</script>