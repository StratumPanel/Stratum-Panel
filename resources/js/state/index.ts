import { createStore } from 'vuex'
import alerts from '@/state/alerts'

const store = createStore({
  modules: {
    alerts
  }
})

export default store