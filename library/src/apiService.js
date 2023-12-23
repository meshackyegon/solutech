// apiService.js

// import axios from 'axios';

// const baseURL = 'http://127.0.0.1:8000/api/v1/'; 

// const apiService = axios.create({
//   baseURL,
//   headers: {
//     'Content-Type': 'application/json',
//     // You can add any other headers needed for your API requests
//   },
// });

// export const getPosts = () => apiService.get('/posts');
// export const createPost = (postData) => apiService.post('/posts', postData);

// export default apiService;


// apiService.js

// apiService.js

import axios from 'axios';

const baseURL = 'http://127.0.0.1:8000/api/v1/';

const apiService = axios.create({
  baseURL,
  headers: {
    'Content-Type': 'application/json',
    // You can add any other headers needed for your API requests
  },
});

export default apiService;

