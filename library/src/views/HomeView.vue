<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const isAuthenticated = ref(false);
const router = useRouter();
const beforeRouteEnter = (to, from, next) => {
  const token = localStorage.getItem('token');

  if (token) {
    isAuthenticated.value = true;
    next();
  } else {
    next({ name: 'Login' });
  }
};
</script>

<template>
  <main>
    <div class="max-w-7xl mx-auto p-8">
      <h1 class="text-3xl font-bold mb-4">Welcome to Our Library Management System</h1>
      
      <p>
        Our Library Management System is designed to streamline the process of managing books, users, and book loans efficiently.
        Whether you are an admin responsible for overseeing the library's operations or a user eager to explore our diverse collection, our platform caters to your needs.
      </p>

      <h2 class="text-2xl font-bold mt-6 mb-4">Key Features:</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- User Registration Card -->
        <div class="bg-white p-4 rounded-md shadow-md">
          <h3 class="text-xl font-semibold mb-2">User Registration</h3>
          <p>Admins have the ability to register new users, providing them access to our library resources.</p>
          <img src="../assets/extension.jpeg" alt="User Registration Image" class="mt-4 w-full h-32 object-cover rounded">
        </div>

        <!-- Book Management Card -->
        <div class="bg-white p-4 rounded-md shadow-md">
          <h3 class="text-xl font-semibold mb-2">Book Management</h3>
          <p>Admins can effortlessly add new books to the library, maintaining a comprehensive catalog.</p>
          <img src="../assets/library.jpeg" alt="Book Management Image" class="mt-4 w-full h-32 object-cover rounded">
        </div>

        <!-- Book Loans Card -->
        <div class="bg-white p-4 rounded-md shadow-md">
          <h3 class="text-xl font-semibold mb-2">Book Loans</h3>
          <p>Users can borrow available books directly from the system, ensuring a seamless borrowing experience.</p>
          <img src="../assets/school_librarian.jpg" alt="Book Loans Image" class="mt-4 w-full h-32 object-cover rounded">
        </div>

        <div class="bg-white p-4 rounded-md shadow-md">
          <h3 class="text-xl font-semibold mb-2">Admin Approval</h3>
          <p>Admins play a pivotal role in approving book loans, ensuring a controlled and monitored lending process.</p>
          <img src="../assets/libraryadmin.jpeg" alt="Admin Approval Image" class="mt-4 w-full h-32 object-cover rounded">
          </div>
          <div class="bg-white p-4 rounded-md shadow-md">
          <h3 class="text-xl font-semibold mb-2">Book Issuance</h3>
          <p>Upon admin approval, the system facilitates the issuance of the requested book to the user.</p>
          <img src="../assets/search.jpg" alt="Book Issuance Image" class="mt-4 w-full h-32 object-cover rounded">
          </div>
          <div class="bg-white p-4 rounded-md shadow-md">
          <h3 class="text-xl font-semibold mb-2">Loan Extension</h3>
          <p>Users are empowered to extend their book loans in case they need more time, promoting flexibility.</p>
          <img src="../assets/library.png" alt="Loan Extension Image" class="mt-4 w-full h-32 object-cover rounded">
          </div>
          <div class="bg-white p-4 rounded-md shadow-md">
          <h3 class="text-xl font-semibold mb-2">Return Process</h3>
          <p>In the event that users cannot return a book within the specified return date, admins can effortlessly manage the return process.</p>
          <img src="../assets/return.jpeg" alt="Return Process Image" class="mt-4 w-full h-32 object-cover rounded">
          </div>
      </div>

      <h2 class="text-2xl font-bold mt-6 mb-4">Going Above and Beyond:</h2>

      <p>
        In response to this code challenge, we have gone above and beyond by prioritizing not only functionality but also the normalization of our database.
        This ensures a robust and scalable foundation, allowing for efficient data management and retrieval.
      </p>

      <p>
        At our library, we believe in the power of technology to enhance the reading experience.
        Whether you are an admin ensuring the smooth operation of the library or a user immersing yourself in the world of books, our Library Management System is tailored to elevate your experience.
      </p>

      <p class="mt-8">
        Explore our platform and embark on a journey of knowledge and discovery!
      </p>
    </div>
  </main>
</template>

