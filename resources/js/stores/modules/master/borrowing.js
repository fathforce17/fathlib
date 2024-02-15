import { mutations, actions, getters } from "@stores/global"

const initialState = () => ({
    initURL: '/app/master/borrowings',
    formErrors: {}
})

const borrowing = {
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
export default borrowing