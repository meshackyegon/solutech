<template>
    <div>
        <h1>Your Main Component</h1>
        <p>Book Id: {{ book.id }}</p>
        
    </div>
</template>
<script>
import api from "@/apiService";
import { ref, onMounted } from "vue";
export default {
  data() {
    return {
      bookId: null,
      book:null,
    };
  },
  mounted() {
    this.bookId = this.$route.params.id;
   
    console.log("Book ID:", this.bookId);
    this.fetchBookDetails();
  }
};
</script>