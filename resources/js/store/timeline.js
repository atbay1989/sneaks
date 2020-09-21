import axios from 'axios'

export default {
    namespaced: true,

    state: {
        sneaks: []
    },

    getters: {
        sneaks (state) {
            return state.sneaks
        }
    },

    mutations: {
        PUSH_SNEAKS (state, data) {
            state.sneaks.push(...data)
        }

    },

    actions: {
        async getSneaks({ commit }) {
            let response = await axios.get("/api/timeline");

            commit('PUSH_SNEAKS', response.data.data)
        }
    }
}