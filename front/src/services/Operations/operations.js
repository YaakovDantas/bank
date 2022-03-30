import { http } from "../config";

export const runTransaction = async (data) => {
  try {
    let response = await http.post("/accounts/transaction", data);
    return response;
  } catch (error) {
    return error.response.data;
  }
};

export const getBalance = async ({ account_number, account_code, agency }) => {
  try {
    let response = await http.get(
      `/accounts/balance/${account_number}/${account_code}/${agency}`
    );
    return response;
  } catch (error) {
    return error;
  }
};

export const getHistoric = async ({ account_number, account_code, agency }) => {
  try {
    let response = await http.get(
      `/accounts/historic/${account_number}/${account_code}/${agency}`
    );
    return response;
  } catch (error) {
    return error;
  }
};
