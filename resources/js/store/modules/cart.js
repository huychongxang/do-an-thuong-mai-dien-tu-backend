const state = {
    count: 10,
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
    mutations,
    actions
};
