import { Module, VuexModule, Mutation, Action } from 'vuex-module-decorators'

import { httpErrorToHuman } from '@/api/http'

import { FlashMessageType } from '@/interfaces/MessageBox'

export interface FlashMessage {
  id?: string;
  key?: string;
  type: FlashMessageType;
  title?: string;
  message: string;
}
export interface FlashError {
  id?: string;
  key?: string;
  message: string;
}

export interface HttpErrorParameters {
  key?: string;
  error: any;
}

@Module({ namespaced: true })
export default class flashes extends VuexModule {
  items: FlashMessage[] = []

  @Mutation
  SET_ITEMS(payload: FlashMessage[]) {
    this.items = payload
  }

  @Action({ commit: 'SET_ITEMS' })
  addFlash(payload: FlashMessage) {
    this.items.push(payload)
  }

  @Action({ commit: 'SET_ITEMS' })
  addError(payload: FlashError) {
    this.items.push({ type: 'error', title: 'Error', ...payload })
  }

  @Action({ commit: 'SET_ITEMS' })
  clearAndAddHttpError({key, error}: HttpErrorParameters) {
    return [ { type: 'error', title: 'Error', key, message: httpErrorToHuman(error, true) } ]
  }
  
}