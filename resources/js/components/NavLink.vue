<template>
    <Link :href="href" :class="classes">
      <slot></slot>
    </Link>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/inertia-vue3'
const { href, classes } = defineProps(['href', 'classes'])
</script>
