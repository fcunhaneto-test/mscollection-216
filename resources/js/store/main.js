import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

import state from './main/state'
import getters from './main/getters'
import mutations from './main/mutations'

export default new Vuex.Store({
    state: state,
    getters: getters,
    mutations: mutations,
})
