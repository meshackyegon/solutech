<template>
    <div>Book.id</div>
</template>
<script setup>
export default {
  data() {
    return {
      bookId: null
    };
  },
  mounted() {
    // Fetch the book ID from the route parameters
    this.bookId = this.$route.params.id;

    // Now you can use this.bookId to perform actions or fetch data for the specific book
    console.log("Book ID:", this.bookId);

    // Example: Fetch book details using the bookId
    this.fetchBookDetails();
  },
  methods: {
    fetchBookDetails() {
      // Make an API call or perform other actions to fetch book details using this.bookId
      // Example API call:
      // api.get(`/books/${this.bookId}`).then(response => {
      //   console.log("Book Details:", response.data);
      // });
    }
  }
};

</script>
