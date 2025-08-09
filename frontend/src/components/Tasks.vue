<script setup>
import { useUser } from '@/stores/user'
import axios from 'axios'
import { onMounted, ref } from 'vue'
import { useRoute } from 'vue-router'
const user = useUser()
const route = useRoute()
const id = route.params.id
const tasks = ref([])

onMounted(async () => {
  try {
    const response = await axios.get(`http://localhost:8000/api/showtasks/${id}`)
    console.log(response.data)
    tasks.value = response.data
    console.log(user)
  } catch (err) {
    console.error(err)
  }
})
</script>

<template>
  <div class="w-full h-[200px] flex justify-center">
    {{ user.name }}
    <div class="w-[50%] bg-green-200 h-[50%]" v-for="task in tasks">
      <div>
        <h1>{{ task.description }}</h1>
        <h1>{{ task.state }}</h1>
      </div>
    </div>
  </div>
</template>
