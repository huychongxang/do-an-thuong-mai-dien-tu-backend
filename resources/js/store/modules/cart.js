const state = {
    count: 10,
}

const mutations = {
    INCREMENT: (state) => {
        state.count++;
    }
}

export default {
    namespaced: true,
    state,
};
