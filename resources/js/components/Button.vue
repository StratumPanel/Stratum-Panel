<template>
    <button :type="type" class="btn">
        <slot></slot>
        </button>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'Button',
    props: {
        type: {
            type: String,
            default: 'submit',
        },
    },
    setup() {},
});
</script>