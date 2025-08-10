
import { createRouter, createWebHistory } from 'vue-router'
import Login from '@/components/Login.vue'
import Register from '@/components/Register.vue'
import Main from '@/components/Main.vue'
import Tasks from '@/components/Tasks.vue'
import Taskmaneger from '@/components/Taskmaneger.vue'

const routes = [
  { path: '/login', component: Login },
  { path: '/register', component: Register },
  { path: '/', component: Main },
  { path: '/MyTasks', component: Tasks },
  { path: '/tasks', component: Taskmaneger },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
