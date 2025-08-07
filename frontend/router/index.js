
import { createRouter, createWebHistory } from 'vue-router'
import Login from '@/components/Login.vue'
import Register from '@/components/Register.vue'
import Main from '@/components/Main.vue'
import Tasks from '@/components/Tasks.vue'

const routes = [
  { path: '/login', component: Login },
  { path: '/register', component: Register },
  { path: '/', component: Main },
  { path: '/tasks/:id', component: Tasks },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
