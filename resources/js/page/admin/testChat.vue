<template>
    <div>
        <Header/>
        <h1>Test</h1>
         <br>
  <div class="" v-if="channelText">
    {{ datas.name }}:  {{ channelText }}
  </div>
<br>
        <input type="text" placeholder="Add text" @keyup.enter="submit" v-model="text">
        <button class="btn btn-dark" @click="submit">Submit</button>
    </div>
</template>
<script setup>
import Header from '@/components/Header.vue'
import axios from 'axios';
import { onMounted, ref } from 'vue';

// user data
const userData = () => {
     axios({
        method: 'GET',
        url: '/api/user'
    }).then(res => {
       datas.value = res.data
       channelText.value = false
})

}
//end user data

const datas = ref({})

//user message
const channelText = ref('')
const text = ref('')
const submit = () => {
    axios({
        url: `/api/test1/${text.value}`,
        method:'GET'
    })
    text.value = ''
    room()
}


//room
const room = (() => {
    Echo.channel('testChannel')
  .listen('testingEvent', e => {
       channelText.value = e.message
       console.log(e);
  })

 })


 onMounted(() => {

    userData()
 })
</script>
