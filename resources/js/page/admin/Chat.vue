<template>
    <Header/>
    <div>
        <div class="container">
            <DisplayMessage :message="message"/>
        </div>

        <InputMessage v-on:message="messageSent()" :name="name" />

    </div>
</template>

<script setup>
import Header from './Header.vue'
import DisplayMessage from './DisplayMessage.vue';
import InputMessage from './InputMessage.vue';
import { onMounted, ref, watch } from 'vue';
import axios from 'axios';

const name = ref(2)
const current = ref()
const message = ref({})

// watch(current,(newVal, oldVal) => {
//     messageSent()
// })

const get = () => {
    set(1)
}
const set = (val) => {
    current.value = val
}


const messageSent = () => {
   axios.get('api/listMessage').then(response => {
    message.value = response.data
   })
}

onMounted(() => {
    messageSent()
    get()
})


</script>
