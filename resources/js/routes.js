import AllCita from './components/AllCita.vue';
import CreateCita from './components/CreateCita.vue';
import EditCita from './components/EditCita.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllCita
    },
    {
        name: 'create',
        path: '/create',
        component: CreateCita
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditCita
    }
];