import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useUser = defineStore('user', () => {
  const name = ref('')
  const id = ref('')
  const email = ref('')
  

  return { name, id,email }
})
