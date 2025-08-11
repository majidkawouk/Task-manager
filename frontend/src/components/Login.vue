<script setup>
import { useUser } from '@/stores/user'
import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const name = ref('')
const password = ref('')
const message = ref('')
const user = useUser()
const route =  useRouter()
async function hendlesubmit() {
  try {
    const response = await axios.post(
      'http://localhost:8000/api/login',
      { name: name.value, password: password.value },
      {
        headers: { 'Content-Type': 'application/json' },
      },
    )
    const data = response.data.user
    const token = response.data.token
    user.edituser(data.name, data.id, data.email, token)
    route.push('/tasks')
  } catch (err) {
    console.error(err)
  }
}


</script>

<template>
  <div
    class="w-full flex flex-col h-[calc(100vh-52px)] md:h-[calc(100vh-80px)] items-center justify-center gap-4 bg-gradient-to-br from-green-100 via-green-200 to-green-300"
  >
    <form
      @submit.prevent="hendlesubmit"
      class="flex flex-col items-center w-[70%] sm:w-[60%] md:w-[40%] p-6 gap-4 rounded-2xl shadow-xl bg-white/30 backdrop-blur-md"
    >
      <img src="/enter.png" alt="Login Icon" class="w-20 h-20" />
      <h1 class="text-3xl font-bold text-green-800">Login Page</h1>

      <input
        v-model="name"
        type="text"
        placeholder="Username"
        class="text-lg bg-white text-black h-10 border border-gray-300 rounded px-3 w-full"
      />
      <input
        v-model="password"
        type="password"
        placeholder="Password"
        class="text-lg bg-white text-black h-10 border border-gray-300 rounded px-3 w-full"
      />

      <button
        type="submit"
        class="mt-4 bg-green-600 text-white text-lg px-6 py-2 rounded hover:bg-green-700 transition"
      >
        Login
      </button>
    </form>
  </div>
</template>

<style scoped></style>
