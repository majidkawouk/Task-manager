<script setup>
import axios from 'axios'
import { onMounted } from 'vue'
import { useRoute } from 'vue-router'
const route = useRoute()
const id = route.params.id
onMounted(async () => {
  try {
    const response = await axios.get(`http://localhost:8000/api/showtasks/${id}`)
    console.log(response.data)
  } catch (err) {
    console.error(err)
  }
})
</script>

<template>
  <div class="w-full h-[200px] flex justify-center">
    <div class="w-[50%] bg-green-200 h-[50%]"></div>
  </div>
</template>
