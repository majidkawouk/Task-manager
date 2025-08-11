<script setup>
import { useUser } from '@/stores/user'
import { computed } from 'vue'

const user = useUser()

const islogedin = computed(() => user.name !== '')
</script>

<template>
  <nav class="w-full bg-green-400 py-2 md:h-20 h-13  flex justify-between">
    <router-link to="/" class="flex items-center">
      <img src="/clipboard.png" alt="logo" class="ml-8 h-10 md:h-18" />
      <p class="md:text-2xl text-xl font-bold">Task <span class="md:text-4xl text-lg text-white">M</span>aneger</p>
    </router-link>
    <div class="flex items-center text-sm md:text-lg">
      <router-link
        to="/login"
        class="md:px-5 px-3 py-1 md:text-xl md:p-2 bg-black mr-2 text-white rounded-sm"
        v-if="!islogedin"
        >login</router-link
      >
      <router-link
        to="/register"
        class="md:px-5 px-3 py-1 md:text-xl md:p-2 bg-black mr-2 text-white rounded-sm"
        v-if="!islogedin"
        >Register</router-link
      >
      <router-link
        to="/"
        class="md:px-5 px-3 py-1 bg-black mr-2 md:text-xl md:p-2  text-white rounded-sm"
        v-if="islogedin"
        
        ><button @click="user.resetuser()">Log out</button></router-link
      >
    </div>
  </nav>
</template>
