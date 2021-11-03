import { createStore } from 'vuex'
import alerts from '@/state/alerts'
import status from '@/state/server/status'

const store = createStore({
  modules: {
    alerts,
    status
  }
})

export default store