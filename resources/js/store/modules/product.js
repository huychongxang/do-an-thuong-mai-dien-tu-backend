import axios from "axios";
const state = {
    limit: 10,
    paginate: {},
    links: {},
    products: [],
    checkedCategories:[]
};
const getters = {};

const mutations = {
    SET_LIMIT: (state, limit) => {
        state.limit = limit;
    },
    SET_PAGINATE: (state, paginate) => {
        state.paginate = paginate;
    },
    SET_LINKS: (state, links) => {
        state.links = links;
    },
    SET_PRODUCTS: (state, products) => {
        state.products = products;
    },
    SET_CATEGORIES: (state, categories) => {
        state.checkedCategories = categories;
    },
};

const actions = {
    setLimit({ commit, dispatch }, limit) {
        commit("SET_LIMIT", limit);
    },
    setPaginate({ commit }, paginate) {
        commit("SET_PAGINATE", paginate);
    },
    setLinks({ commit }, links) {
        commit("SET_LINKS", links);
    },
    setProducts({ commit }, products) {
        commit("SET_PRODUCTS", products);
    },
    setCategories({ commit }, categories) {
        commit("SET_CATEGORIES", categories);
    },
    async fetchProducts({ commit, state }, page = 1) {
        const response = await axios.get("/api-web/products", {
            params: {
                limit: state.limit,
                page: page,
                categories:state.checkedCategories
            }
        });
        const object = response.data;
        commit("SET_PRODUCTS", object.data);
        commit("SET_PAGINATE", object.meta);
        commit("SET_LINKS", object.links);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
