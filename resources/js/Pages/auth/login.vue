<template>
    <form @submit.prevent="submit">
        <div id="wrapper">
            <div class="main-content">
                <div class="header">
                <img class="login-logo" src="assets/logo.png" />
                </div>
                <div class="overlap-text">
                    <input v-model="form.email" type="email"  name="email" id="email" placeholder="Enter email" class="input-1" />
                    <small class="text-danger" v-if="errors.email" >{{ errors.email }}</small>
                </div>
                <div class="overlap-text">
                    <input v-model="form.password" type="password"  name="" id="password" placeholder="Enter password" class="input-1" />
                    <small class="text-danger" v-if="errors.password" >{{ errors.password }}</small>
                </div>
                <small class="text-danger" v-if="errors.length>1">{{ errors }}</small>
                <input type="submit" value="Log in" class="btn" />
                </div>
            <div class="sub-content">
                <div class="s-part">
                Don't have an account?<a @click.prevent="router.get('/register')"> Sign up</a>
                </div>
            </div>
        </div>
    </form>
    </template>
    
    <script setup>
    import { useForm } from '@inertiajs/vue3';
    import { router } from '@inertiajs/vue3';
    import { defineProps } from 'vue';
    
    // Define 'errors' prop
    defineProps({
  errors: {
    type: Object,
    default: () => ({})
  },
});
    
    // Initialize form with useForm hook
    const form = useForm({
        email: null,
        password: null,
    });
    
  // Function to handle form submission
  async function submit() {
    router.post('/login', form);
  }
    </script>