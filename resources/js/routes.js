const Home = () => import ('./components/Home.vue')
const Show = () => import ('./components/pictures/Show.vue')
const Edit = () => import ('./components/pictures/Edit.vue')
const Create = () => import ('./components/pictures/Create.vue')

export const routes = [
    {
         name: 'home',
         path: '/home',
         component: Home
    },
    {
        name: 'show',
        path: '/show',
        component: Show
   },
   {
        name: 'create',
        path: '/create',
        component: Create
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: Edit
    },
]