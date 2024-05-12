<template>
    <form @submit.prevent="submit">
        <div id="wrapper">
            <div class="main-content">
                <div class="header">
                <img class="login-logo" src="assets/logo.png" />
                </div>
                <div class="l-part">
                    <input v-model="form.name" type="text"  name="name" id="name" placeholder="Enter full name" class="input-1" />
                    <small v-if="errors.name && errors.name.length" class="text-danger" v-for="error in errors.name" :key="error">{{ error }}</small>

                </div>
                <div class="overlap-text">
      
                    <input v-model="form.email" type="email"  name="email" id="email" placeholder="Enter email" class="input-1" />
                    <small v-if="errors.email && errors.email.length" class="text-danger" v-for="error in errors.email" :key="error">{{ error }}</small>

                </div>
                <div class="overlap-text">
                    <input v-model="form.password" type="password"  name="" id="password" placeholder="Enter password" class="input-1" />
                    <small v-if="errors.password && errors.password.length" class="text-danger" v-for="error in errors.password" :key="password">{{ error }}</small>

                </div>

                <input type="submit" value="Log in" class="btn" />
                </div>
            <div class="sub-content">
                <div class="s-part">
                Don't have an account?<a @click.prevent="router.get('/login')"> Sign up</a>
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
        name: null,
        email: null,
        password: null,
    });
    
  // Function to handle form submission
  async function submit() {
    try {
      const response = await router.post('/register', form);
      console.log(response);
      // Handle success
    } catch (error) {
      if (error.response && error.response.data && error.response.data.props && error.response.data.props.errors) {
        console.log(error.response.data.props.errors);
        // Handle specific errors
      } else {
        console.error('An unexpected error occurred');
      }
    }
  }
    </script>