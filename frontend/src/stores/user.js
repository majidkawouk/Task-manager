import { defineStore } from 'pinia'

export const useUser = defineStore('user', {
  state: () => ({
    name: '',
    id: '',
    email: ''
  }),
  actions: {
    edituser(n, i, em) {
      this.name = n
      this.id = i
      this.email = em
    }
  },
  persist: true 
})
