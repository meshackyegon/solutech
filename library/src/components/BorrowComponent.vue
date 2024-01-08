<template>
  <div class="container mx-auto">
    <p class="text-center text-xl font-bold">My name is Mesha, and I want to borrow a book</p>
    <h2 class="text-center text-2xl font-bold">Book id: {{ bookId }}</h2>

    <div class="flex justify-center mt-8">
      <label for="returnDate" class="mr-2">Return Date:</label>
      <input type="date" id="returnDate" v-model="returnDate" class="border border-gray-300 rounded px-2 py-1" />
      <button class="ml-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded" @click="borrowBook">Confirm</button>
    </div>

    <div>
      <!-- Add your additional content here -->
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
      returnDate: null,
      user: null,
    };
  },
  mounted() {
    this.bookId = this.$route.params.id;
    console.log("Book ID:", this.bookId);
    this.fetchBookDetails();
    this.fetchLoggedInUser();
  },
  methods: {
    fetchBookDetails() {
      const token = localStorage.getItem("token");
      const user_id = localStorage.getItem("user_id");
      api.get(`/books/${this.bookId}`, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          this.book = response.data.data;
          console.log("Book Details:", response.data.data);
        });
    },
    borrowBook() {
      const token = localStorage.getItem("token");
      const user_id = localStorage.getItem("user_id");
      const payload = {
        return_date: this.returnDate,
        user_id: user_id,
        
      };
      api.post(`/loans/${this.bookId}`, payload, {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          console.log("Borrow Book Response:", response.data);
          // Handle the response here
          alert("The book has been borrowed successfully!");
        })
        .catch((error) => {
          console.error("Borrow Book Error:", error);
          // Handle the error here
          alert("Failed to borrow the book. Please try again later.");
        });
    },
  },
};
</script>
