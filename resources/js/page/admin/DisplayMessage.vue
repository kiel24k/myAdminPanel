<template>
    <div style="height: 20rem;background-color:pink;  overflow: auto;
  max-height: 100%;
  display: flex;
  flex-direction: column-reverse;">
       <div v-for="data in props.message" :key="data">
        {{data.sender_id}}: {{ data.message }}
       </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { onMounted } from 'vue';

const props = defineProps(['message'])





</script>
