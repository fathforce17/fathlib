import product from "./product";
import productcategory from "./productcategory";
import borrowing from "./borrowing";
import book from "./book";

export default [
  {
    path: "master",
    name: "Master",
    redirect: { name: "MasterList" },
    meta: {
      label: "master.master",
      icon: "fas fa-database",
      hideChildren: false,
    },
    component: {
      template: "<router-view></router-view>",
    },
    children: [...productcategory, ...product, ...borrowing, ...book],
  },
];
