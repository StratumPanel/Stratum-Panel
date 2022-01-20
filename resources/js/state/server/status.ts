import { ServerState, FormattedBytes } from '@api/server/getStatus'

export interface ServerStatus {
  id: number;
  state: ServerState;
  cpu: number;
  mem: FormattedBytes;
  maxmem: FormattedBytes;
  memUnparsed: MemUnparsed;
}

export interface MemUnparsed {
  mem: number;
  maxmem: number;
}

const status = {
  namespaced: true,

  state: () => ({
    id: NaN,
    state: 'querying',
    cpu: 0,
    mem: { size: 0, unit: 'B' },
    maxmem: { size: 0, unit: 'B' },
    memUnparsed: {
      mem: 0,
      maxmem: 0,
    },
  }),

  mutations: {
    setStatus(state: ServerStatus, payload: ServerStatus) {
      Object.assign(state, payload)
    },
  },

  actions: {
    setStatus(context: any, payload: ServerStatus) {
      context.commit('setStatus', payload)
    },

    clearStatus(context: any) {
      context.commit('setStatus', {
        id: NaN,
        state: 'querying',
        cpu: 0,
        mem: { size: 0, unit: 'B' },
        maxmem: { size: 0, unit: 'B' },
        memUnparsed: {
          mem: 0,
          maxmem: 0,
        },
      })
    },
  },
}

export default status
