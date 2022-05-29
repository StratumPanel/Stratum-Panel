// @ts-nocheck
//require('./bootstrap')

import {
  App as InertiaApp,
  createInertiaApp,
  plugin as InertiaPlugin,
} from '@inertiajs/inertia-vue3'
import { createApp, h } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import '@/plugins/axios'
import store from '@/state'
import NProgress from 'nprogress'
import '../css/app.css'

function resolvePageComponent(name: string, pages: Record<string, any>) {
  for (const path in pages) {
    if (path.endsWith(`${name.replace('.', '/')}.vue`)) {
      return typeof pages[path] === 'function'
        ? pages[path]()
        : pages[path]
    }
  }

  throw new Error(`Page not found: ${name}`)
}

createInertiaApp({
  resolve: (name) => resolvePageComponent(name, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, app, props, plugin }) {
    createApp({ render: () => h(app, props) })
    .mixin({ methods: { route } })
      .use(plugin)
      .use(store)
      .mount(el)
  },
})

Inertia.on('start', () => NProgress.start())
Inertia.on('finish', (event) => {
  if (event.detail.visit.completed) {
    NProgress.done()
  } else if (event.detail.visit.interrupted) {
    NProgress.set(0)
  } else if (event.detail.visit.cancelled) {
    NProgress.done()
    NProgress.remove()
  }
})
