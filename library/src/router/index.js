import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/HomeView.vue')
    },
    {
      path:'/login',
      name:'login',
      component: () => import('../views/LoginView.vue')
    },
    {
      path:'/register',
      name:'register',
      component: ()=>import ('../views/RegisterView.vue')
  },
  {
    path:'/books',
    name:'books',
    component: ()=>import ('../views/BooksView.vue')
    
  },
  {
    path:'/book/:id',
    name:'book',
    component: ()=>import ('../views/BookView.vue'),
  },
  {
    path:'/borrow/:id',
    name:'borrow',
    component: ()=>import ('../views/BorrowView.vue'),
  }

  ]
})

export default router
