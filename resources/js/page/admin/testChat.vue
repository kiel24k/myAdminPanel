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
        <br>
        <label for="Chose ID">Choose ID you want to chat</label>
        <select name="" id="" v-model="choseId">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        </select>
        {{choseId}}
    </div>
</template>
<script setup>
import Header from '@/components/Header.vue'
import axios from 'axios';
import { onMounted, ref, watch } from 'vue';

// user data
const userData = () => {
     axios({
        method: 'GET',
        url: '/api/user'
    }).then(res => {
       datas.value = res.data
    //    channelText.value = false
   
})

}
//end user data

const datas = ref({})

//user message
const channelText = ref('')
const text = ref('')
const submit = () => {
    axios({
        url: `/api/test1/${text.value}/${choseId.value}`,
        method:'GET',
    })
     console.log(datas.value.id);
    room()
    text.value = ''
    
}


//room public channel
// const room = (() => {
//     Echo.channel('testChannel')
//   .listen('testingEvent', e => {
//        channelText.value = e.message
//        console.log(e.message);  
//   })

//  })

//private channel for single room with 1 to 1 message
const room = ( () => {
    Echo.private(`private-channel.user.${choseId.value}`)
    .listen('PrivateEvent', (e) => {
        channelText.value = e.message
        console.log(e)
    })
})

const choseId = ref('')
watch(choseId, (oldVal, newVal) => {
    room()
})
 onMounted(() => {
    room()
    userData()
 })
</script>
