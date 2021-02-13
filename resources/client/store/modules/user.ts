import { Module, VuexModule, Mutation, Action } from 'vuex-module-decorators'

import { AccountData } from '@client/api/account/getAccountData'

@Module({ namespaced: true })
export default class user extends VuexModule {
  userData?: AccountData

  @Mutation
  SET_USERDATA(payload: AccountData) {
    this.userData = payload
  }

  @Action({ commit: 'SET_USERDATA' })
  setUserData(payload: AccountData) {
    return payload
  }

  @Action({ commit: 'SET_USERDATA' })
  updateUserData({payload, state}: any) {
    return { ...this.context.getters["getUserData"], ...payload}
  }

  get getUserData() {
    return this.userData
  }
}