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
        }
    },

    actions: {
        async resneakSneak(_, sneak) {
            await axios.post(`api/sneaks/${sneak.id}/resneaks`)
        },

        async unresneakSneak(_, sneak) {
            await axios.delete(`api/sneaks/${sneak.id}/resneaks`)
        },

    }
}