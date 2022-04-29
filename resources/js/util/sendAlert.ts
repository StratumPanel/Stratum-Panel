import { useStore } from 'vuex'
import { faCheck, faTimes } from '@fortawesome/free-solid-svg-icons'

const store = useStore()

export const sendPending = (msg: string) => {
  store.dispatch('alerts/createAlert', {
    message: msg,
    timeout: false,
  })
}

export const sendSuccess = (msg: string) => {
  store.dispatch('alerts/createAlert', {
    message: msg,
    icon: faCheck,
  })
}

export const sendError = (msg: string) => {
  store.dispatch('alerts/createAlert', {
    message: msg,
    icon: faTimes,
  })
}
