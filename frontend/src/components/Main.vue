<script setup></script>

<template>
  <div class="min-h-screen flex flex-col justify-center items-center bg-green-100 text-center p-4 relative">
    
    <img 
      src="/tasklist.png" 
      alt="background" 
      class="absolute md:inset-0 md:w-1/2 md:h-full object-cover opacity-5 pointer-events-none top-40"
    />

  
    <h1 class="font-bold text-2xl md:text-4xl">Welcome to Task Manager</h1>
    <h2 class="font-bold text-lg md:text-2xl mt-2">Empowering teams. Enabling leaders.</h2>


    <ul class="mt-6 space-y-4 md:space-y-10 text-base md:text-2xl font-medium max-w-md">
      <li><span class="font-extrabold">- Your Tasks</span><br>Stay on top of your responsibilities. Here's what's assigned to you.</li>
      <li><span class="font-extrabold">- Team Overview</span><br>Monitor your team’s progress and collaborate effectively.</li>
      <li><span class="font-extrabold">- Pending Approvals (Leader Only)</span><br>Review and approve task completions.</li>
    </ul>

  
    <div class="flex flex-col sm:flex-row items-center gap-3 mt-8 md:text-2xl">
      <router-link to="/MyTasks" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">
        View My Tasks
      </router-link>
      <p class="font-bold">OR</p>
      <router-link to="/tasks" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">
        Add Tasks
      </router-link>
    </div>
  </div>
</template>
