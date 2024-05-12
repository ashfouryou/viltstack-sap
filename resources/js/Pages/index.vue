<template>
    <div>
      <!-- Conditionally render user information if user is logged in -->
      <div v-if="user">
        <h1>Welcome, {{ user.name }}</h1>
        <p>Email: {{ user.email }}</p>
        <button @click="logout">Logout</button>
      </div>
      <!-- If user is not logged in, show navigation to sign up or sign in -->
      <div v-else>

       <a @click.prevent="router.get('/register')">Sign Up</a>
       <br>
       <a @click.prevent="router.get('/login')">Log in</a>
      </div>

    </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  import { router } from '@inertiajs/vue3';
  import { usePage } from '@inertiajs/vue3';

  // Define 'user' prop
  defineProps({
    user: Object,
  });
  
  function logout() {
    router.get('/logout');
  }
  </script>
  
  <style>
  /* Your component styles */
  </style>
  