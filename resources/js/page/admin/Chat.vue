<template>
    <Header/>
    <div>
        <div class="container" style="overflow:scroll">
            <DisplayMessage/>

        </div>
        <InputMessage @messageSent="messageSent()"/>

    </div>
</template>

<script setup>
import Header from './Header.vue'
import DisplayMessage from './DisplayMessage.vue';
import InputMessage from './InputMessage.vue';
import { onMounted } from 'vue';





</script>
