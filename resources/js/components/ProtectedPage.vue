<!-- src/components/ProtectedPage.vue -->
<template>
  <div v-if="isAuthenticated">
    <p>Welcome, {{ user.name }}!</p>
    <button @click="logout">Logout</button>
  </div>
  <div v-else>
    <p>Please log in to access this page.</p>
  </div>
</template>

<script setup>
import { onMounted } from 'vue';
import { useUserStore } from '../stores/userStore';

const userStore = useUserStore();
const { user, isAuthenticated, logout } = userStore;

onMounted(() => {
  userStore.fetchUser();
});
</script>
