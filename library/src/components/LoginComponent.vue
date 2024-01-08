<template>
  <div class="login-container bg-white p-8 mx-auto max-w-md border border-gray-300 rounded shadow">
    <form @submit.prevent="login">
      <label for="email" class="block mb-2">Email:</label>
      <input type="text" id="email" v-model="email" required class="w-full p-2 mb-4 border border-gray-300 rounded">

      <label for="password" class="block mb-2">Password:</label>
      <input type="password" id="password" v-model="password" required class="w-full p-2 mb-4 border border-gray-300 rounded">

      <button type="submit" class="bg-green-500 text-white p-3 rounded cursor-pointer">Login</button>
    </form>
  </div>
</template>

<script>
import { login } from '@/authService';
import { RouterLink } from 'vue-router';

export default {
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    async login() {
      try {
        console.log('Sending login request with data:', {
          email: this.email,
          password: this.password,
        });

        const token = await login({
          email: this.email,
          password: this.password,
        });
        console.log('Login successful! Token:', token);
        if (token) {
          localStorage.setItem('token', token);
          localStorage.setItem('email', this.email);
          localStorage.setItem('user_id', token.user_id);
          // localStorage.setItem('role', token.role);
          localStorage.setItem('name', token.name);

          this.$router.push({ name: 'books' });
        }
      } catch (error) {
        console.error('Error during login:', error);
      }
    },
  },
};
</script>
