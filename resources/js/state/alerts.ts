import { FontawesomeObject } from '@fortawesome/fontawesome-svg-core'

export interface AlertMessage {
    message: string;
    icon: null | FontawesomeObject;
}

const alerts = {
    namespaced: true,

    state: (): AlertMessage => ({
        message: '',
        icon: null,
    }),
    mutations: {
        setMessage (state: AlertMessage, message: string) {
            state.message = message
        },

        setIcon (state: AlertMessage, icon: null | FontawesomeObject) {
            state.icon = icon
        }
    },
    actions: {
        clearAlerts (context: any) { // I hate it
            context.commit('setMessage', '')
            context.commit('setIcon', null)
        },

        clearSpecificAlert (context: any, message: string) {
            if (context.state.message === message) {
                context.dispatch('clearAlerts')
            }
        },

        createAlert (context: any, message: string, icon: FontawesomeObject, timeout: boolean) {

        }
    }
}

export default alerts