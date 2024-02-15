import axios from "axios";
import * as Api from "@core/apis";
import * as Form from "@core/utils/form";
import { useToast } from "vue-toastification";
import { mutations, actions, getters } from "@stores/global";

const toast = useToast();

import product from "@stores/modules/master/product";
import productcategory from "@stores/modules/master/productcategory";
import borrowing from "@stores/modules/master/borrowing";
import book from "@stores/modules/master/book";

const initialState = () => ({
  initURL: "/app/master",
  formErrors: {},
});

const master = {
  namespaced: true,
  state: initialState,
  modules: {
    product,
    productcategory,
    borrowing,
    book,
  },
  mutations: {
    ...mutations,
  },
  actions: {
    ...actions,
  },
  getters: {
    ...getters,
  },
};

export default master;
