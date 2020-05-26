import axios from "axios";
const state = {
    products: [],
    sub_total: 0,
    sub_total_format:null,
    shipping_cost: 0,
    shipping_cost_format:null,
    total: 0,
    total_format:null,
    link_keep_shopping:null
};
const getters = {};

const mutations = {
    SET_PRODUCTS: (state, products) => {
        state.products = products;
    },
    SET_SUB_TOTAL: (state, sub_total) => {
        state.sub_total = sub_total;
    },
    SET_SHIPPING_COST: (state, shipping_cost) => {
        state.shipping_cost = shipping_cost;
    },
    SET_TOTAL: (state, total) => {
        state.total = total;
    },
    SET_SUB_TOTAL_FORMAT: (state, sub_total) => {
        state.sub_total_format = sub_total;
    },
    SET_SHIPPING_COST_FORMAT: (state, shipping_cost) => {
        state.shipping_cost_format = shipping_cost;
    },
    SET_TOTAL_FORMAT: (state, total) => {
        state.total_format = total;
    },
    SET_LINK_KEEP_SHOPPING: (state, link) => {
        state.link_keep_shopping = link;
    },
};

const actions = {
    async fetchCart({ commit, state }, page = 1) {
        const response = await axios.get("/api-web/cart", {});
        const object = response.data.data;
        commit("SET_PRODUCTS", object.content);
        commit("SET_SUB_TOTAL", object.sub_total);
        commit("SET_SHIPPING_COST", object.shipping_cost);
        commit("SET_TOTAL", object.total);
        commit("SET_LINK_KEEP_SHOPPING", object.link_keep_shopping);
        commit("SET_SUB_TOTAL_FORMAT", object.sub_total_format);
        commit("SET_SHIPPING_COST_FORMAT", object.shipping_cost_format);
        commit("SET_TOTAL_FORMAT", object.total_format);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
