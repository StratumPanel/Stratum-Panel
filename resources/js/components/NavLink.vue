<template>
    <inertia-link :href="href" :class="classes">
      <slot></slot>
    </inertia-link>
</template>

<script>
export default {
  props: [ 'href', 'classes'],
}
</script>
