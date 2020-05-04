import Vue from 'vue';
import Vuex from 'vuex';
import getters from './getters'
import camelCase from 'camelcase';

Vue.use(Vuex);
const modulesFiles = require.context('./modules', false, /\.js$/);
const modules = modulesFiles.keys().reduce((modules, modulePath) => {
    // set './app.js' => 'app'
    const moduleName = camelCase(modulePath.replace(/^\.\/(.*)\.\w+$/, '$1'));
    const value = modulesFiles(modulePath);
    modules[moduleName] = value.default;
    return modules;
}, {});

const store = new Vuex.Store({
    getters,
    modules,
});

export default store;
