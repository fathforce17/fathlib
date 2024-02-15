import { mutations, actions, getters } from "@stores/global"

const initialState = () => ({
    initURL: '/app/master/books',
    formErrors: {}
})

const book = {
    namespaced: true,
    state: initialState,
    modules: {},
    mutations: {
        ...mutations
    },
    actions: {
        ...actions
    },
    getters: {
        ...getters
    }
}
export default book
