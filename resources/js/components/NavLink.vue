<template>
  <div>
    <inertia-link :href="href" :class="classes">
      <slot></slot>
    </inertia-link>
  </div>
</template>

<script>
export default {
  props: [ 'href', 'classes'],
}
</script>
