const state = {
    count: 10,
}
const getters = {
    a(){
        return 'haha'
    }
}

const mutations = {
    INCREMENT: (state) => {
        state.count++;
    }
}

const actions = {
    increment({commit}){
        commit('INCREMENT');
    }
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
