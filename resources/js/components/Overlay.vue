<template>
    <div class="absolute inset-0">
        <div class="z-40 absolute inset-0 backdrop-blur-sm bg-white/80"></div>
        <div class="z-50 absolute inset-0" :class="center ? 'grid place-items-center' : ''"><slot></slot></div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'Overlay',
    props: {
        center: {
            type: Boolean
        }
    },
    setup() {},
});
</script>