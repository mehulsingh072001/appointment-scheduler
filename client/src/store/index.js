import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    month: "",
  },

  getters: {
    getMonth: state => state.month
  },

  mutations: {
    next(state){
      state.month++
    },
    prev(state){
      state.month--
    },
    setCurrentMonth(state){
      var d = new Date()
      return state.month = d.getMonth()
    }
  },
  actions: {
    getCurrentMonth({commit}){
      commit('setCurrentMonth')
    }
  },

  modules: {
  }
})
