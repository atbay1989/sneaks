import axios from 'axios'
import { without } from 'lodash'

export default {
  namespaced: true,

  state: {
    resneaks: []
  },

  getters: {
    resneaks(state) {
      return state.resneaks
    }
  },

  mutations: {
    PUSH_RESNEAKS(state, data) {
      state.resneaks.push(...data)
    },

    PUSH_RESNEAK(state, id) {
      state.resneaks.push(id)
    },

    POP_RESNEAK(state, id) {
      state.resneaks = without(state.resneaks, id)
    }
  },

  actions: {
    async resneakSneak(_, sneak) {
      await axios.post(`api/sneaks/${sneak.id}/resneaks`)
    },

    async unresneakSneak(_, sneak) {
      await axios.delete(`api/sneaks/${sneak.id}/resneaks`)
    },

    syncResneak({ commit, state }, id) {
      if (state.resneaks.includes(id)) {
        commit('POP_RESNEAK', id)
        return
      }

      commit('PUSH_RESNEAK', id)
    }

  }
}