<template>
  <div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-1/4 bg-gray-800 text-white p-4">
      <h2 class="text-2xl font-semibold mb-4">Categories</h2>
      <ul>
        <li class="cursor-pointer hover:underline" @click="filterBooks('fantasy')">Fantasy</li>
        <li class="cursor-pointer hover:underline" @click="filterBooks('science-fiction')">Science Fiction</li>
        <li class="cursor-pointer hover:underline" @click="filterBooks('mystery')">Mystery</li>
        <!-- Add more categories as needed -->
      </ul>
    </aside>

    <!-- Content Area -->
    <main class="flex-1 p-4 overflow-y-auto">
      <h1 class="text-3xl font-semibold mb-8">Book List</h1>

      <!-- Book Table -->
      <table class="min-w-full bg-white border border-gray-300">
        <thead>
          <tr>
            <th class="py-2 px-4 border-b">Name</th>
            <th class="py-2 px-4 border-b">Publisher</th>
            <th class="py-2 px-4 border-b">ISBN</th>
            <th class="py-2 px-4 border-b">Category</th>
            <th class="py-2 px-4 border-b">Subcategory</th>
            <th class="py-2 px-4 border-b">Description</th>
            <th class="py-2 px-4 border-b">Images</th>
            <th class="py-2 px-4 border-b">View</th>
          </tr>
        </thead>
        <tbody>
          <!-- <router-link v-for="book in books" :key="book.id" :to="{ name: 'book', params: { id: book.id } }"> -->
          <tr v-for="book in books" :key="book.id" class="bg-blue p-4 rounded-md shadow-md cursor-pointer hover:bg-[#fad49398] dark:border-gray-700">
            
            <td class="py-2 px-4 border-b">{{ book.name }}</td>
            <td class="py-2 px-4 border-b">{{ book.publisher }}</td>
            <td class="py-2 px-4 border-b">{{ book.isbn }}</td>
            <td class="py-2 px-4 border-b">{{ book.category }}</td>
            <td class="py-2 px-4 border-b">{{ book.sub_category }}</td>
            <td class="py-2 px-4 border-b">{{ book.description }}</td>
            <td class="py-2 px-4 border-b">{{ book.image }}</td>
            <td class="py-2 px-4 border-b">
              <router-link :to="{ name: 'book', params: { id: book.id } }">
                <button class="bg-green-500 text-white px-2 py-1 rounded-md">Details</button>
              </router-link>
            </td>
          
          </tr>

        </tbody>
      </table>
    </main>
  </div>
</template>



<script setup>
import { ref, onMounted } from 'vue';
import apiService from '@/apiService';

const books = ref([]);
const token = localStorage.getItem('token');

onMounted(async () => {
  // try {
  //   const response = await apiService.get('books');
  //   books.value = response.data.data;
  //   console.log(response.data);
  // } catch (error) {
  //   console.error('Error fetching books:', error);
  // }
  try {
    const response = await apiService.get('books', {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });

    books.value = response.data.data;
    console.log(response.data);
  } catch (error) {
    console.error('Error fetching books:', error);
  }
});
</script>
