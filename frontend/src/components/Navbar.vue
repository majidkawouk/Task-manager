<script setup></script>

<template>
  <nav class="w-full bg-green-400 py-2 h-20 flex justify-between">
    <div class="flex items-center">
      <img src="/clipboard.png" alt="logo" class="ml-8" />
      <p class="text-2xl font-bold">Task <span class="text-4xl text-white">M</span>aneger</p>
    </div>
    <div class="flex items-center">
      <router-link to="/login" class="px-5 py-1 bg-black mr-4 text-white rounded-sm"
        >login</router-link
      >
      <router-link to="/register" class="px-5 py-1 bg-black mr-4 text-white rounded-sm"
        >Register</router-link
      >
    </div>
  </nav>
</template>

<style scoped></style>
