import { useUserStore } from '../stores/userStores';

export default {
  mounted(el, binding) {
    const store = useUserStore();
    const requiredRole = binding.value;

    store.fetchUser().then(() => {
      const user = store.user;

      if (!user || !user.roles.includes(requiredRole)) {
        el.style.display = 'none';
      }
    });
  }
};