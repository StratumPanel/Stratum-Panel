import { ServerState, FormattedBytes } from '@api/server/getStatus'

export interface ServerStatus {
    id: number;
    state: ServerState;
    cpu: number;
    mem: FormattedBytes;
    maxmem: FormattedBytes;
}

const status = {
    namespaced: true,

    state: () => ({
        id: NaN,
        state: 'querying',
        cpu: 0,
        mem: { size: 0, unit: 'B' },
        maxmem: { size: 0, unit: 'B' },
    }),

    mutations: {
        setId(state: ServerStatus, id: number) {
            state.id = id
        },

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
            context.commit('setId', payload.id)
            context.commit('setState', payload.state)
            context.commit('setCpu', payload.cpu)
            context.commit('setMem', payload.mem)
            context.commit('setMaxmem', payload.maxmem)
        },

        clearStatus (context: any) {
            context.commit('setId', 0)
            context.commit('setState', 'querying')
            context.commit('setCpu', 0)
            context.commit('setMem', { size: 0, unit: 'B' })
            context.commit('setMaxmem', { size: 0, unit: 'B' })
        }
    }
}

export default status