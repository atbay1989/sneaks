import axios from 'axios'
import { without } from 'lodash'

export default {
    namespaced: true,

    state: {
        likes: []
    },

    getters: {
        likes (state) {
            return state.likes
        }
    },

    mutations: {
        PUSH_LIKES (state, data) {
            state.likes.push(...data)
        },

        PUSH_LIKE (state, id) {
            state.likes.push(id)
        },

        POP_LIKE (state, id) {
            state.likes = without(state.likes, id)
        }
    },

    actions: {
        async likeSneak (_, sneak) {
            await axios.post(`api/sneaks/${sneak.id}/likes`)
        },

        async unlikeSneak (_, sneak) {
            await axios.delete(`api/sneaks/${sneak.id}/likes`)
        },

        syncLike ({ commit, state }, id) {
            if (state.likes.includes(id)) {
                commit('POP_LIKE', id)
                return
            }

            commit('PUSH_LIKE', id)
        }

    }
}