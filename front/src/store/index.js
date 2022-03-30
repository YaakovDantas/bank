import Vue from "vue";
import Vuex from "vuex";
import * as OperationsService from "../services/Operations/operations";

Vue.use(Vuex);

function updateBalance(
  currentValue,
  { amount: newValue, type: typeOperation }
) {
  currentValue = parseFloat(currentValue);
  newValue = parseFloat(newValue);
  if (typeOperation === "DEPOSIT") {
    return (currentValue += newValue);
  } else {
    return (currentValue -= newValue);
  }
}

export default new Vuex.Store({
  state: {
    user_data: {
      name: "Thiago Yaakov Dantas",
      account_number: "111",
      agency: "333",
      account_code: "22",
    },
    balance: 0,
    historic: [],
  },
  mutations: {
    SET_USER_DATA(state, data) {
      state.user_data = data;
    },
    SET_ACCOUNT_BALANCE(state, data) {
      state.balance = data;
    },
    SET_ACCOUNT_HISTORIC(state, data) {
      state.historic = data;
    },
  },
  actions: {
    async sendTransaction({ state, commit, dispatch }, transaction) {
      let data = {
        ...transaction,
        account_number: `${transaction.account_number}`,
        amount: `${transaction.amount}`,
        type: transaction.type.toUpperCase(),
      };
      try {
        let response = await OperationsService.runTransaction(data);

        if (!response.erro) {
          let newBalance = await updateBalance(state.balance, {
            ...response.data,
          });
          dispatch("getHistoric", { ...state.user_data });
          commit("SET_ACCOUNT_BALANCE", `${newBalance}`);
          return response.data;
        } else {
          return response;
        }
      } catch (error) {
        Promise.reject(error);
      }
    },

    async getBalanceUser({ commit }, { account_number, account_code, agency }) {
      try {
        let response = await OperationsService.getBalance({
          account_number,
          account_code,
          agency,
        });
        commit("SET_ACCOUNT_BALANCE", response.data.balance);
        Promise.resolve();
      } catch (error) {
        Promise.reject(error);
      }
    },

    async getHistoric({ commit }, { account_number, account_code, agency }) {
      try {
        let response = await OperationsService.getHistoric({
          account_number,
          account_code,
          agency,
        });

        response.data.sort(function (a, b) {
          let one = new Date(a.created_at).valueOf();
          let two = new Date(b.created_at).valueOf();
          return two - one;
        });
        commit("SET_ACCOUNT_HISTORIC", response);
        Promise.resolve();
      } catch (error) {
        Promise.reject(error);
      }
    },
  },
  modules: {},
});
