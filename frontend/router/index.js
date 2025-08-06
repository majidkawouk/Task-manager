
import { createRouter, createWebHistory } from 'vue-router'
import Login from '@/components/Login.vue'
import Register from '@/components/Register.vue'
import Main from '@/components/Main.vue'

const routes = [
  { path: '/login', component: Login },
  { path: '/register', component: Register },
  { path: '/', component: Main },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
