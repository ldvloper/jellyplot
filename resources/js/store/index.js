import { createStore } from 'vuex'

import actions from './actions'
import mutations from './mutations'
import getters from './getters'
import state from "./state";

// Create a new store instance.
const store = createStore({
    state,
    actions,
    getters,
    mutations,
})

export default store;

