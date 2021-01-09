import { Module, VuexModule, Mutation, Action } from 'vuex-module-decorators'

import { AccountData } from '@/api/account/getAccountData'

@Module({ namespaced: true })
export default class user extends VuexModule {
  // @ts-expect-error: Account Data is parsed from JSON string into an array
  userData: AccountData | null = JSON.parse(localStorage.getItem('userData')) || null

  @Mutation
  SET_USERDATA(payload: AccountData) {
    this.userData = payload
  }

  @Action({ commit: 'SET_USERDATA' })
  setUserData(userData: AccountData) {
    localStorage.setItem('userData', JSON.stringify(userData))
    
    return userData
  }
  
  get UserData(): AccountData | null {
      return this.userData
  }
}