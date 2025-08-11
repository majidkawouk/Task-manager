import { defineStore } from 'pinia'

export const useUser = defineStore('user', {
  state: () => ({
    name: '',
    id: '',
    email: '',
    token:''
  }),
  actions: {
    edituser(n, i, em,t) {
      this.name = n
      this.id = i
      this.email = em
      this.token = t
    },
    resetuser() {
      this.name = ""
      this.id = ""
      this.email = ""
    }
  },
  persist: true 
})
