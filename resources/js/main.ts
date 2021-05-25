// @ts-nocheck
require('./bootstrap')

// Import modules...
import { createApp, h } from 'vue'
import {
  App as InertiaApp,
  plugin as InertiaPlugin,
} from '@inertiajs/inertia-vue3'
import NProgress from 'nprogress'
import { Inertia } from '@inertiajs/inertia'

const el = document.getElementById('app')

createApp({
  render: () =>
    h(InertiaApp, {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: (name) => require(`./Pages/${name}`).default,
    }),
})
  .mixin({ methods: { route } })
  .use(InertiaPlugin)
  .mount(el)

Inertia.on('start', () => NProgress.start())
Inertia.on('finish', () => NProgress.done())
