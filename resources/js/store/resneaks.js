import axios from 'axios'
import { without } from 'lodash'

export default {
    namespaced: true,

    state: {
        resneaks: []
    },

    getters: {
        resneaks (state) {
            return state.resneaks
        }
    },

    mutations: {
        PUSH_RESNEAKS (state, data) {
            state.resneaks.push(...data)
        }
    }

    // actions: {
    //     async likeSneak (_, sneak) {
    //         await axios.post(`api/sneaks/${sneak.id}/likes`)
    //     },

    //     async unlikeSneak (_, sneak) {
    //         await axios.delete(`api/sneaks/${sneak.id}/likes`)
    //     },

    //     syncLike ({ commit, state }, id) {
    //         if (state.likes.includes(id)) {
    //             commit('POP_LIKE', id)
    //             return
    //         }

    //         commit('PUSH_LIKE', id)
    //     }

    // }
}