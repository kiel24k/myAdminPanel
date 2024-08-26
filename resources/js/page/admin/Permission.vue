<template>
 <div class="">
     <div>
    <p v-if="user">Hello, {{ user.name }}</p>
    <p v-if="!user">Loading...</p>
  </div>
  <div class="">
    <RoleBasedContent role="admin">
      <p>This content is only visible to admins.</p>
    </RoleBasedContent>
  </div>
  <div>
    <button v-role="'admin'">Admin Button</button>
    <button v-role="'editor'">Editor Button</button>
    <button v-role="'viewer'">Viewer Button</button>
  </div>
 </div>
</template>

<script setup>
import { useUserStore } from "/resources/js/stores/userStores";
import { onMounted } from "vue";
import RoleBasedContent from "@/components/RoleBasedContent.vue";

const userStore = useUserStore();

onMounted(() => {
  userStore.fetchUser();
});
</script>
