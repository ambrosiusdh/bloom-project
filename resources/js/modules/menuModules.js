import * as constant from "../constant/modulesConstant"

const state = {
    currentMenu: "dashboard",
    nearEmptyQuantity: 1,
    apiPath: "http://localhost:8000/",
    csrfToken: "",
    isLoading: false
};

const getters = {
    [constant.CURRENT_MENU]: function(state){
        return state.currentMenu;
    },
    [constant.NEAR_EMPTY_QUANTITY]: function (state) {
        return state.nearEmptyQuantity;
    },
    [constant.API_PATH]: function (state) {
        return state.apiPath;
    },
    [constant.CSRF_TOKEN]: function (state) {
        return state.csrfToken;
    },
    [constant.IS_LOADING]: function (state) {
        return state.isLoading;
    }
};

const mutations = {
    changeActiveMenu: function(state, payload){
        state.currentMenu = payload;
    },
    changeNearEmptyQuantity: function(state, payload){
        state.nearEmptyQuantity = payload;
    },
    changeCsrfToken: function(state, payload){
        state.csrfToken = payload;
    },
    changeIsLoading: function(state, payload){
        state.isLoading = payload;
    }
};

const actions = {
    changeActiveMenu: function({commit}, payload){
        commit("changeActiveMenu", payload);
    },
    changeNearEmptyQuantity: function({commit}, payload){
        commit("changeNearEmptyQuantity", payload);
    },
    changeCsrfToken: function({commit}, payload){
        commit("changeCsrfToken", payload);
    },
    changeIsLoading: function({commit}, payload){
        commit("changeIsLoading", payload);
    }
};

export default {
    state,
    getters,
    mutations,
    actions
}
