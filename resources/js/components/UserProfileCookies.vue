<template>
  <div>
    <h1>User Profile</h1>
    <p v-if="user">Welcome, {{ user.name }}</p>
    <p v-else>Loading...</p>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from '../axios'; // Adjust the path as needed

const user = ref(null);

const fetchUser = async () => {
  try {
    const response = await axios.get('/user');
    user.value = response.data;
  } catch (error) {
    if (error.response.status === 401) {
      // Handle unauthorized access
      console.log('User is not authenticated');
      // Optionally redirect to login page
    } else {
      console.error('Failed to fetch user data:', error);
    }
  }
};

onMounted(fetchUser);
</script>