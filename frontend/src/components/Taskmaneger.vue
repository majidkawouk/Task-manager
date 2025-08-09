<script setup>
import { useUser } from '@/stores/user'
import axios from 'axios'
import { onMounted, ref } from 'vue'

const user = useUser()
const tasks = ref([])
const users = ref([])

const description = ref('')
const days = ref('')
const selectedUserId = ref('')

function getUserName(userId) {
  const foundUser = users.value.find((u) => u.id === userId)
  return foundUser ? foundUser.name : 'Unknown user'
}

async function fetchData() {
  try {
    const taskResponse = await axios.get('http://localhost:8000/api/showtasks')
    tasks.value = taskResponse.data

    const usersResponse = await axios.get('http://localhost:8000/api/users')
    users.value = usersResponse.data
  } catch (err) {
    console.error('Error fetching data:', err)
  }
}

async function handleDelete(taskId) {
  try {
    await axios.delete(`http://localhost:8000/api/tasks/${taskId}`)
    tasks.value = tasks.value.filter((t) => t.id !== taskId)
  } catch (err) {
    console.error('Error deleting task:', err)
  }
}

async function addTask(e) {
  e.preventDefault()
  try {
    const newTask = {
      description: description.value,
      days: days.value,
      user_id: selectedUserId.value,
    }

    const res = await axios.post('http://localhost:8000/api/addtask', newTask)
    tasks.value.push(res.data)

    description.value = ''
    days.value = ''
    selectedUserId.value = ''
  } catch (err) {
    console.error('Error adding task:', err)
  }
}

onMounted(() => {
  console.log('From store:', user.name, user.email)
  fetchData()
})
</script>

<template>
  <div class="max-w-4xl mx-auto p-6 space-y-8">
    <form class="flex flex-col space-y-4 bg-white p-6 rounded-lg shadow-lg" @submit="addTask">
      <input
        type="text"
        placeholder="Task description"
        v-model="description"
        class="border border-gray-300 rounded-md p-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-400"
      />
      <input
        type="number"
        placeholder="Days to complete task"
        v-model="days"
        class="border border-gray-300 rounded-md p-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-400"
      />
      <select
        v-model="selectedUserId"
        class="border border-gray-300 rounded-md p-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-400"
      >
        <option value="">Select user</option>
        <option v-for="user in users" :key="user.id" :value="user.id">
          {{ user.name }}
        </option>
      </select>
      <button
        type="submit"
        class="self-start bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md px-6 py-2 transition"
      >
        Add Task
      </button>
    </form>

    <div class="space-y-4">
      <div
        v-for="task in tasks"
        :key="task.id"
        class="bg-gray-800 rounded-md p-4 shadow-md text-white"
      >
        <h1 class="text-lg font-semibold mb-1">{{ task.description }}</h1>
        <hr class="border-gray-600 mb-2" />
        <h2 class="text-sm uppercase tracking-wider text-green-400 font-bold mb-1">
          {{ task.state }}
        </h2>
        <h3 class="text-sm text-gray-300">Assigned to: {{ getUserName(task.user_id) }}</h3>
        <button
          class="py-1 mt-2 px-3 bg-red-500 text-black font-bold"
          @click="handleDelete(task.id)"
        >
          Delete
        </button>
      </div>
    </div>
  </div>
</template>
