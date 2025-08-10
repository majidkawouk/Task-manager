<script setup>
import { useUser } from '@/stores/user'
import axios from 'axios'
import { onMounted, ref } from 'vue'

const user = useUser()
const id = user.id
const tasks = ref([])

function getRemainingDays(targetDate) {
  const today = new Date()
  today.setHours(0, 0, 0, 0)

  const dueDate = new Date(targetDate)
  dueDate.setHours(0, 0, 0, 0)

  let diffTime = dueDate - today
  let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24))

  return diffDays < 0 ? 0 : diffDays
}

onMounted(async () => {
  try {
    const response = await axios.get(`http://localhost:8000/api/showtasks/${id}`)
    tasks.value = response.data.map(task => ({
      ...task,
      isClicked: false
    }))
  } catch (err) {
    console.error(err)
  }
})

async function handleDone(task) {
  if (task.state === 'done') return

  try {
    await axios.patch(`http://localhost:8000/api/updatetask/${task.id}`, {
      state: 'done',
    })
    task.state = 'done'
  } catch (err) {
    console.error('Failed to update task state:', err)
  }
}
</script>

<template>
  <div class="w-full flex justify-center space-y-4 py-7 flex-col text-white font-semibold">
    <div
      v-for="task in tasks"
      :key="task.id"
      class="w-[70%] bg-gray-800 p-4 shadow-md rounded-md mx-auto"
    >
      <h1>{{ task.description }}</h1>
      <hr class="border-gray-600 mb-2" />
      <div
        class="text-sm flex justify-between items-center"
        :class="task.state === 'pending' ? 'text-red-400' : 'text-green-400'"
      >
        <div>
          <h1>{{ task.state }}</h1>
          <h2 class="text-green-400">
            Remaining Time: {{ getRemainingDays(task.deadline) }} days
          </h2>
        </div>
        <button
          v-if="task.state !== 'done'"
          @click="handleDone(task)"
          class="bg-green-500 hover:bg-green-600 text-black font-semibold rounded px-3 py-1"
        >
          Done
        </button>
      </div>
    </div>
  </div>
</template>
