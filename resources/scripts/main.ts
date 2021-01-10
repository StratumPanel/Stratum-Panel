import Vue from 'vue'

/* Vue Files */
import App from '@/App.vue'

/* Plugins */
import vuetify from '@/plugins/vuetify'
import store from '@/plugins/store'
import router from '@/plugins/router'

Vue.config.productionTip = false

new Vue({
    vuetify,
    store,
    router,
    render: h => h(App),
}).$mount('#app')