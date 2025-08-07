<script setup></script>

<template>
<div class="flex w-full relative flex-col justify-center items-center text-2xl gap-4 bg-green-100 h-[calc(100vh-80px)]">
  <img src="/tasklist.png" alt="photo" class="absolute opacity-5 rotate-35 left-105">
  <h1 class="font-bold text-3xl">Welcome to Task Manager</h1>
  <h2 class="font-bold text-2xl">Empowering teams. Enabling leaders.</h2>
  <ul class="flex justify-center flex-col items-center gap-9 font-semibold">
    <li class="font-extrabold">-Your Tasks</li>
    <li>Stay on top of your responsibilities. Here's what's assigned to you.</li>
    <li class="font-extrabold">-Team Overview</li>
    <li>Monitor your team’s progress and collaborate effectively.</li>
    <li>Pending Approvals (Leader Only)</li>
    <li>Review and approve task completions.</li>
  </ul>
  <div class="flex gap-4 items-center">
  <router-link to="/tasks" class="text-lg p-3 rounded-sm bg-black text-white">Veiw My Tasks</router-link>
  <p class="font-bold ">Or</p>
  <router-link to="/leader" class="text-lg p-3 rounded-sm bg-black text-white">Add Tasks</router-link>
  </div>
  </div>
</template>

<style></style>
