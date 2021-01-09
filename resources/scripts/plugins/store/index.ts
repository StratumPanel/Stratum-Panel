import Vue from 'vue'
import Vuex from 'vuex'

import auth from '@/plugins/store/modules/auth'
import user from '@/plugins/store/modules/user'

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    auth,
    user
  },
  // Making sure that we're doing
  // everything correctly by enabling
  // strict mode in the dev environment.
  strict: process.env.NODE_ENV !== 'production',
});