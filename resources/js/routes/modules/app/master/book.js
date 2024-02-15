export default [
  {
    path: "books",
    name: "Book",
    redirect: { name: "BookList" },
    meta: {
      label: "master.book.book",
      icon: "fa-solid fa-arrow-right",
      hideChildren: true,
      permissions: ['book:read']
    },
    component: {
      template: "<router-view></router-view>",
    },
    children: [
      {
        path: "",
        name: "BookList",
        meta: {
          trans: "global.list",
          label: "master.book.book",
        },
        component: () =>
          import("@views/Pages/Master/Book/Index.vue"),
      },
      {
        path: "create",
        name: "BookCreate",
        meta: {
          type: "create",
          action: "create",
          trans: "global.add",
          label: "master.book.book",
          permissions: ['book:create']
        },
        component: () =>
          import("@views/Pages/Master/Book/Action.vue"),
      },
      {
        path: ":uuid/edit",
        name: "BookEdit",
        meta: {
          type: "edit",
          action: "update",
          trans: "global.edit",
          label: "master.book.book",
          permissions: ['book:edit']
        },
        component: () =>
          import("@views/Pages/Master/Book/Action.vue"),
      },
      {
        path: ":uuid/duplicate",
        name: "BookDuplicate",
        meta: {
          type: "duplicate",
          action: "create",
          trans: "global.duplicate",
          label: "master.book.book",
          permissions: ['book:create']
        },
        component: () =>
          import("@views/Pages/Master/Book/Action.vue"),
      },
      {
        path: ":uuid",
        name: "BookShow",
        meta: {
          trans: "global.detail",
          label: "master.book.book",
          permissions: ['book:read']
        },
        component: () => import("@views/Pages/Master/Book/Show.vue"),
      },
    ],
  },
];
