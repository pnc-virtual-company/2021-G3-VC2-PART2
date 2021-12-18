import Vue from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'

Vue.config.productionTip = false

let app = new Vue({
  router,
  vuetify,
  render: h => h(App)
})
app.$mount('#app')
