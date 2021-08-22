import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    month: "",
    year: "",
    dates: []
  },

  getters: {
    getMonth: state => state.month,
    getYear: state => state.year,
    getDates: state => state.dates
  },

  mutations: {
    setCurrentMonth(state){
      var d = new Date()
      return state.month = d.getMonth()
    },
    setCurrentYear(state){
      var d = new Date()
      return state.year = d.getFullYear()
    },
    setDatesInMonth(state){
      var date = new Date(state.year, state.month);
      while(date.getMonth() === state.month){
        state.dates.push(new Date(date));
        date.setDate(date.getDate() + 1);
      }
    },
    setDatesInNextMonth(state){
      state.month++
      var date = new Date(state.year, state.month);
      while(date.getMonth() === state.month){
        state.dates.push(new Date(date));
        date.setDate(date.getDate() + 1);
      }
    }
  },
  actions: {
    getCurrentMonth({commit}){
      commit('setCurrentMonth')
    },
    getCurrentYear({commit}){
      commit('setCurrentYear')
    },
    getDatesInMonth({commit}){
      commit('setDatesInMonth')
    },
    getDatesInNextMonth({commit}){
      commit('setDatesInNextMonth')
    },
  },

  modules: {
  }
})
