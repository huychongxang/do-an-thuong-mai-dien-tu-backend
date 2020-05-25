const state = {
    limit: 10,
    paginate:{}
}
const getters = {

}

const mutations = {
    SET_LIMIT: (state,limit) => {
        state.limit = limit;
    },
    SET_PAGINATE: (state,paginate) => {
        state.paginate = paginate;
    }
}

const actions = {
    setLimit({commit},limit){
        commit('SET_LIMIT',limit);
    },
    setPaginate({commit},paginate){
        commit('SET_PAGINATE',paginate);
    },
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
