import axios from 'axios'
import { get } from 'lodash'

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
        },

        POP_SNEAK(state, id) {
            state.sneaks = state.sneaks.filter((t) => {
                return t.id !== id
            })
        },

        SET_LIKES(state, { id, count }) {
            state.sneaks = state.sneaks.map((t) => {
                if (t.id === id) {
                    t.likes_count = count
                }

                if (get(t.original_sneak), 'id' === id) {
                    t.original_sneak.likes_count = count
                }
                return t
            })
        },

        SET_RESNEAKS(state, { id, count }) {
            state.sneaks = state.sneaks.map((t) => {
                if (t.id === id) {
                    t.resneaks_count = count
                }

                if (get(t.original_sneak), 'id' === id) {
                    t.original_sneak.resneaks_count = count
                }
                return t
            })
        }

    },

    actions: {
        async getSneaks({ commit }, url) {
            let response = await axios.get(url);
            commit('PUSH_SNEAKS', response.data.data)
            commit('likes/PUSH_LIKES', response.data.meta.likes, { root: true })
            commit('resneaks/PUSH_RESNEAKS', response.data.meta.resneaks, { root: true })

            return response
        }
    }
}