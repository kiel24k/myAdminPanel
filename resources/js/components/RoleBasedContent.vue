<template>
  <div v-if="hasRole">
    <slot></slot>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import { useUserStore } from '../stores/userStores';

const props = defineProps({
  role: String
});

const userStore = useUserStore();
const hasRole = computed(() => {
  return userStore.user?.roles.includes(props.role);
});
</script>