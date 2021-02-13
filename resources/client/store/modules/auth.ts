import { Module, VuexModule, Mutation, Action } from 'vuex-module-decorators'

@Module({ namespaced: true })
export default class auth extends VuexModule {
  // @ts-expect-error: Authenticated state is parsed from JSON string into an array
  authenticated: boolean = JSON.parse(localStorage.getItem('authenticated')) || false

  @Mutation
  SET_AUTHENTICATED(payload: boolean) {
    this.authenticated = payload
  }

  @Action({ commit: 'SET_AUTHENTICATED' })
  setAuthenticated(status: boolean) {
    localStorage.setItem('authenticated', JSON.stringify(status))
    
    return status
  }
  

  get AuthState(): boolean {
      return this.authenticated
  }
}