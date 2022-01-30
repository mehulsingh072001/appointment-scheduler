import Vue from 'vue'
import App from './App.vue'
import store from './store'
import 'document-register-element/build/document-register-element'

import vueCustomElement from 'vue-custom-element'

Vue.use(vueCustomElement)

App.store = store
Vue.customElement('vue-widget', App)
