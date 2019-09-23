import * as constant from "../constant/modulesConstant"

const state = {
    currentMenu: "dashboard",
    testInput: "test"
};

const getters = {
    [constant.CURRENT_MENU]: function(state){
        return state.currentMenu;
    }
};

const mutations = {
    changeActiveMenu: function(state, payload){
        state.currentMenu = payload;
    }
};

const actions = {
    changeActiveMenu: function({commit}, payload){
        commit("changeActiveMenu", payload);
    }
};

export default {
    state,
    getters,
    mutations,
    actions
}
