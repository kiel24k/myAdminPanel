import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useUserStore = defineStore('user', () => {
  const user = ref(null);
  const isAuthenticated = ref(false);

  const fetchUser = async () => {
    try {
      const response = await fetch('/api/user1');
      if (response.ok) {
        user.value = await response.json();
        isAuthenticated.value = true;
        console.log(user.value);
        
      } else {
        user.value = null;
        isAuthenticated.value = false;
      }
    } catch (error) {
      console.error('Error fetching user:', error);
    }
  };


  const logout = async () => {
    try {
      await fetch('/api/logout', { method: 'POST' });
      user.value = null;
      isAuthenticated.value = false;
    } catch (error) {
      console.error('Error logging out:', error);
    }
  };

  return { user, isAuthenticated, fetchUser, logout };
});