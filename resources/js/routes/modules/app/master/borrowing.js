export default [
    {
        path: 'borrowings',
        name: 'Borrowing',
        redirect: { name: 'BorrowingList' },
        meta: {
            label: 'master.borrowing.borrowing',
            icon: 'fa-solid fa-arrow-right',
            hideChildren: true,
            permissions: ['borrowing:read']
        },
        component: {
            template: '<router-view></router-view>'
        },
        children: [
            {
                path: '',
                name: 'BorrowingList',
                meta: {
                    trans: 'global.list',
                    label: 'master.borrowing.borrowing',
                },
                component: () => import('@views/Pages/Master/Borrowing/Index.vue'),
            },
            {
                path: 'create',
                name: 'BorrowingCreate',
                meta: {
                    type: 'create',
                    action: 'create',
                    trans: 'global.add',
                    label: 'master.borrowing.borrowing',
                    permissions: ['borrowing:create']
                },
                component: () => import('@views/Pages/Master/Borrowing/Action.vue'),
            },
            {
                path: ':uuid/edit',
                name: 'BorrowingEdit',
                meta: {
                    type: 'edit',
                    action: 'update',
                    trans: 'global.edit',
                    label: 'master.borrowing.borrowing',
                    permissions: ['borrowing:edit']
                },
                component: () => import('@views/Pages/Master/Borrowing/Action.vue'),
            },
            {
                path: ':uuid/duplicate',
                name: 'BorrowingDuplicate',
                meta: {
                    type: 'duplicate',
                    action: 'create',
                    trans: 'global.duplicate',
                    label: 'master.borrowing.borrowing',
                    permissions: ['borrowing:create']
                },
                component: () => import('@views/Pages/Master/Borrowing/Action.vue'),
            },
            {
                path: ':uuid',
                name: 'BorrowingShow',
                meta: {
                    trans: 'global.detail',
                    label: 'master.borrowing.borrowing',
                    permissions: ['borrowing:read']
                },
                component: () => import('@views/Pages/Master/Borrowing/Show.vue'),
            }
        ]
    },
]
