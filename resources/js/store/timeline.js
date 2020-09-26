import axios from 'axios'

export default {
    namespaced: true,

    state: {
        sneaks: []
    },

    getters: {
        sneaks(state) {
            return state.sneaks
                .sort((a, b) => b.created_at - a.created_at)
        }
    },

    mutations: {
        PUSH_SNEAKS(state, data) {
            state.sneaks.push(
                ...data.filter((sneak) => {
                    return !state.sneaks.map((t) => t.id).includes(sneak.id)
                })

            )
        }

    },

    actions: {
        async getSneaks({ commit }, url) {
            let response = await axios.get(url);
            commit('PUSH_SNEAKS', response.data.data)
            commit('likes/PUSH_LIKES', response.data.meta.likes, { root: true })
            return response
        }
    }
}