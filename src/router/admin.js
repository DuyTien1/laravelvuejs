const admin = [
    {
        path: "/admin",
        component: () => import("../layouts/admin.vue"),
        children: [
            //authors
            {
                path: "authors",
                name: "admin-authors",
                component: () => import("../pages/admin/authors/index.vue")
            },
            {
                path: "authors/create",
                name: "admin-authors-create",
                component: () => import("../pages/admin/authors/create.vue")
                
            },
            {
                path: "authors/edit/:id",
                name: "admin-authors-edit",
                component: () => import("../pages/admin/authors/edit.vue")
                
            },

            //stories
            {
                path: "stories",
                name: "admin-stories",
                component: () => import("../pages/admin/stories/index.vue")
            },
            {
                path: "stories/create",
                name: "admin-stories-create",
                component: () => import("../pages/admin/stories/create.vue")
            },
            {
                path: "stories/edit/:id",
                name: "admin-stories-edit",
                component: () => import("../pages/admin/stories/edit.vue")
            },

            //chapters
            {
                path: "chapters",
                name: "admin-chapters",
                component: () => import("../pages/admin/chapters/index.vue")
            },
            {
                path: "chapters/create",
                name: "admin-chapters-create",
                component: () => import("../pages/admin/chapters/create.vue")
            },
            {
                path: "chapters/edit/:id",
                name: "admin-chapters-edit",
                component: () => import("../pages/admin/chapters/edit.vue")
            },

            //comments
            {
                path: "comments",
                name: "admin-comments",
                component: () => import("../pages/admin/comments/index.vue")
            },
            {
                path: "comments/create",
                name: "admin-comments-create",
                component: () => import("../pages/admin/comments/create.vue")
            },
            {
                path: "comments/edit/:id",
                name: "admin-comments-edit",
                component: () => import("../pages/admin/comments/edit.vue")
            },
            

            //categories
            {
                path: "categories",
                name: "admin-categories",
                component: () => import("../pages/admin/categories/index.vue")
            },
            {
                path: "categories/create",
                name: "admin-categories-create",
                component: () => import("../pages/admin/categories/create.vue")
            },
            {
                path: "categories/edit/:id",
                name: "admin-categories-edit",
                component: () => import("../pages/admin/categories/edit.vue")
            },

            //users
            {
                path: "users/test",
                name: "admin-users-test",
                component: () => import("../pages/admin/users/test.vue")
            },
            {
                path: "users/create",
                name: "admin-users-create",
                component: () => import("../pages/admin/users/create.vue")
            },
            {
                path: "users",
                name: "admin-users",
                component: () => import("../pages/admin/users/index.vue")
            },
            {
                path: "users/edit/:id",
                name: "admin-users-edit",
                component: () => import("../pages/admin/users/edit.vue")
            },

            //roles
            {
                path: "roles",
                name: "admin-roles",
                component: () => import("../pages/admin/roles/index.vue")
            },
            {
                path: "roles/create",
                name: "admin-roles-create",
                component: () => import("../pages/admin/roles/create.vue")
            },
            {
                path: "roles/edit/:id",
                name: "admin-roles-edit",
                component: () => import("../pages/admin/roles/edit.vue")
            },

            //settings
            {
                path: "settings",
                name: "admin-settings",
                component: () => import("../pages/admin/settings/index.vue")
            },
            {
                path: "settings",
                name: "admin-settings-create",
                component: () => import("../pages/admin/settings/create.vue")
            },
            {
                path: "settings",
                name: "admin-settings-edit",
                component: () => import("../pages/admin/settings/edit.vue")
            },
        ]
    }
]

export default admin;