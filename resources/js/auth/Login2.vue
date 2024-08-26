<template>
  <div>
    <form @submit.prevent="login">
      <input v-model="email" type="email" placeholder="Email" required />
      <input v-model="password" type="password" placeholder="Password" required />
      <label>
        <input type="checkbox" v-model="rememberMe" />
        Remember Me
      </label>
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios'; // Adjust the path as needed
import { useRouter } from 'vue-router';
const router = useRouter()


const email = ref('');
const password = ref('');
const rememberMe = ref(false);

const login = async () => {
  try {
    await axios.get('/sanctum/csrf-cookie').then(response => {
      axios({
        method:'POST',
        url: '/api/login-cookies',
        data: {
          email: email.value,
          password: password.value
        }
      }).then(response => {
        console.log(response);
        
      })
      
    })
    
    
  } catch (error) {
    console.log('Login failed:', error.response.data);
  }
};
</script>