// authService.js

import apiService from '@/apiService';

export const login = async (credentials) => {
  try {
    const response = await apiService.post('/login', credentials);
    // Assuming the API returns a token upon successful login
    const token = response.data.token;
    // You might want to store the token in a secure way (e.g., in a cookie or local storage)
    return token;
  } catch (error) {
    throw error;
  }
};

export const logout = async () => {
  try {
    // You can implement logout logic here, e.g., invalidate the token
    // and perform any necessary cleanup
  } catch (error) {
    throw error;
  }
};
