<!-- RegisterComponent.vue -->

<template>
  <div class="register-container bg-white p-8 mx-auto max-w-md border border-gray-300 rounded shadow">
    <form @submit.prevent="register">
      <label for="name" class="block mb-2">Name:</label>
      <input type="text" id="name" v-model="name" required class="w-full p-2 mb-4 border border-gray-300 rounded">

      <label for="email" class="block mb-2">Email:</label>
      <input type="email" id="email" v-model="email" required class="w-full p-2 mb-4 border border-gray-300 rounded">

      <label for="password" class="block mb-2">Password:</label>
      <input type="password" id="password" v-model="password" required class="w-full p-2 mb-4 border border-gray-300 rounded">

      <label for="password_confirmation" class="block mb-2">Confirm Password:</label>
      <input type="password" id="password_confirmation" required class="w-full p-2 mb-4 border border-gray-300 rounded">

      <button type="submit" class="bg-blue-500 text-white p-3 rounded cursor-pointer">Register</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
    };
  },
  methods: {
    register() {
      if (this.password !== this.password_confirmation) {
        alert('Passwords do not match!');
        return;
      }else{}
      // Add your registration logic here
      console.log('Registering with:', this.name, this.email, this.password);
      // You can make an API request here to register the user
      
    },
  },
};
</script>

<!-- No need for scoped styles when using Tailwind CSS -->

<!-- No separate style tag is required for Tailwind CSS styles -->
