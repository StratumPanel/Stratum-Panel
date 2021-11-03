import { ServerState, FormattedBytes } from '@api/server/getStatus'

export interface ServerStatus {
    state: ServerState;
    cpu: number;
    mem: FormattedBytes;
    maxmem: FormattedBytes;
}

const status = {
    namespaced: true,

    state: () => ({
        state: 'querying',
        cpu: 0,
        mem: { size: 0, unit: 'B' },
        maxmem: { size: 0, unit: 'B' },
    }),

    mutations: {
        setState (state: ServerStatus, status: ServerState) {
            state.state = status // im sorry for whoever is reading this, it was a COINCIDENCE!!
        },

        setCpu (state: ServerStatus, Cpu: number) {
            state.cpu = Cpu
        },

        setMem (state: ServerStatus, Mem: FormattedBytes) {
            state.mem = Mem
        },

        setMaxmem (state: ServerStatus, Maxmem: FormattedBytes) {
            state.maxmem = Maxmem
        }
    },

    actions: {
        setStatus (context: any, payload: ServerStatus) {
            context.commit('setState', payload.state)
            context.commit('setCpu', payload.cpu)
            context.commit('setMem', payload.mem)
            context.commit('setMaxmem', payload.maxmem)
        }
    }
}

export default status