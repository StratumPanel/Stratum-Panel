import { createStore } from "vuex";

import auth from '@client/store/modules/auth'
import user from '@client/store/modules/user'
import flashes from '@client/store/modules/flashes'

export default createStore({
  modules: {
    auth,
    user,
    flashes
  },
  // Making sure that we're doing
  // everything correctly by enabling
  // strict mode in the dev environment.
  strict: process.env.NODE_ENV !== 'production',
});