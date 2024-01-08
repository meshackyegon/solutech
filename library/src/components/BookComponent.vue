
<template>
    <div class="container mx-auto mt-8">
      <h2 class="text-3xl font-semibold mb-4">Book Details</h2>
  
      <div v-if="book" class="bg-white p-8 rounded-md shadow-md">
        <div class="grid grid-cols-2 gap-4">
          <div>
            <h3 class="text-xl font-semibold mb-2">{{ book.name }}</h3>
            <p class="text-gray-600 mb-2">Publisher: {{ book.publisher }}</p>
            <p class="text-gray-600 mb-2">ISBN: {{ book.isbn }}</p>
            <p class="text-gray-600 mb-2">Category: {{ book.category }}</p>
            <p class="text-gray-600 mb-2">Subcategory: {{ book.sub_category }}</p>
            <p class="text-gray-600 mb-2">Pages: {{ book.pages }}</p>
            <p class="text-gray-600 mb-2">Image: {{ book.image}}</p>
          </div>
          <div>
            <img src="@/assets/trust.jpg" alt="Book Cover" class="w-full h-auto rounded-md shadow-md">
          </div>
        </div>
  
        <div class="mt-4">
          <h4 class="text-lg font-semibold mb-2">Description</h4>
          <p class="text-gray-700">{{ book.description }}</p>
        </div>
  
        <div class="mt-4">
          <h4 class="text-lg font-semibold mb-2">Borrow this Book</h4>
          <!-- <button @click="borrowBook" class="bg-blue-500 text-white px-4 py-2 rounded-md">Borrow Now</button> -->
          <router-link :to="{ name: 'borrow', params: { id: book.id }  }" class="bg-blue-500 text-white px-4 py-2 rounded-md">Borrow Now</router-link>
        </div>
      </div>
    </div>
  </template>
  
<script>
import api from "@/apiService";
import { ref, onMounted } from "vue";

export default {
  data() {
    return {
      bookId: null,
      book: null,
    };
  },
  mounted() {
    this.bookId = this.$route.params.id;
    console.log("Book ID:", this.bookId);
    this.fetchBookDetails();
  },
  methods: {
    fetchBookDetails() {
      const token = localStorage.getItem('token');
      api.get(`/books/${this.bookId}`, {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      }).then(response => {
        this.book = response.data.data;
        console.log("Book Details:", response.data.data);
      });
    },
  },
};

</script>
