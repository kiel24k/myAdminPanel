<template>
  <div>
    <h1>User Profile</h1>
    <div v-if="user">
      <p>Name: {{ user.name }}</p>
      <p>Email: {{ user.email }}</p>
      <!-- Add more user details as needed -->
    </div>
    <div v-else>
      <p>Loading...</p>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios'; // Adjust the path as needed

const user = ref(null);
const error = ref(null);

const fetchUserProfile =  () => {
    axios.get('/sanctum/csrf-cookie').then((response) => {
        axios({
        method: 'GET',
        url:'api/get-user'
     }).then(response => {
        console.log(response);
     })
    })
     
  }

onMounted(() => {
    fetchUserProfile()
});
</script>