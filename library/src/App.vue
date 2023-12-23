<script>
import { RouterLink, RouterView } from 'vue-router'

export default {
  methods: {
    logout() {
      // Clear local storage
      localStorage.clear();

      // Clear session storage
      sessionStorage.clear();
      this.$router.push('/login');
    },
  },
};
</script>

<template>
  <header>
    <div class="max-w-7xl mx-auto">
      <p class="text-center font-bold text-3xl">Solutech Library Assessment</p>
      <nav class="flex items-center justify-end py-4">
        <div>
          <RouterLink to="/" class="text-blue-500 hover:text-blue-700 mr-4">Home</RouterLink>
          <RouterLink to="/login" class="text-gray-500 hover:text-gray-700 mr-4">Login</RouterLink>
          <RouterLink to="/register" class="text-brown-500 hover:text-brown-700">Register</RouterLink>
          <RouterLink to="/books" class="text-brown-500 hover:text-brown-700">Books</RouterLink>
          <button @click="logout" class="text-brown-500 hover:text-brown-700">Logout</button>
        </div>
      </nav>
    </div>
  </header>

  <main class="max-w-7xl mx-auto min-h-screen">
    <RouterView />
  </main>

  <footer class="bg-gray-200 py-4">
    <div class="max-w-7xl mx-auto flex justify-between">
      <div>
        <h3>About Us</h3>
        <ul>
          <li><RouterLink to="/about">About</RouterLink></li>
        </ul>
      </div>
      <div>
        <h3>Contact Us</h3>
        <ul>
          <li><RouterLink to="/contact">Contact</RouterLink></li>
        </ul>
      </div>
      <div>
        <h3>Social Media</h3>
        <ul>
          <li><a href="https://twitter.com">Twitter</a></li>
          <li><a href="https://facebook.com">Facebook</a></li>
          <li><a href="https://instagram.com">Instagram</a></li>
        </ul>
      </div>
    </div>
  </footer>
</template>
