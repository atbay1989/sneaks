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
        async getSneaks({ commit }, url) {
            let response = await axios.get(url);
            commit('PUSH_SNEAKS', response.data.data)

            return response
        }
    }
}