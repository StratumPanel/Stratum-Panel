import { createStore } from 'vuex'
import alerts from '@/state/alerts'
import serverStatus from '@/state/server/status'

const store = createStore({
  modules: {
    alerts,
    serverStatus,
  }
})

export default store