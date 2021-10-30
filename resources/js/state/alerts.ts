import { FontawesomeObject } from '@fortawesome/fontawesome-svg-core'

export interface AlertMessage {
    message: string;
    icon: null | FontawesomeObject;
}

export interface CreateAlertPayload extends AlertMessage {
    timeout?: boolean;
    timeoutDuration?: number;
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
        clearAlerts (context: any) { // I hate using 'any'
            context.commit('setMessage', '')
            context.commit('setIcon', null)
        },

        clearSpecificAlert (context: any, message: string) {
            if (context.state.message === message) {
                context.dispatch('clearAlerts')
            }
        },

        createAlert (context: any, payload: CreateAlertPayload) {
            context.commit('setMessage', payload.message)
            context.commit('setIcon', payload.icon)

            if (payload.timeout === undefined || payload.timeout) {
                setTimeout(() => {
                    context.dispatch('clearSpecificAlert', payload.message)
                }, (payload.timeoutDuration) ? payload.timeoutDuration : 3000);
            }
        }
    }
}

export default alerts