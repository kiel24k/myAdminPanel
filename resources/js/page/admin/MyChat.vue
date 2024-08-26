<template>
    <Header/>
    <div class="list-of-users">
        <div class="info">
            <div class="users" v-for="(data, index) in allUsersData" :key='index'>
               <div class="" style="padding: 10px" @click="getUserMessage(data.id)">
               {{data.name}}
               </div>
            </div>
        </div>
    </div>
    
    <div class="chat-message">
        <section>
        <div class="chat-box" v-for="(data, index) in fromMessage" :key='index'>
        <div class="chat-text-from" v-if="receiverID == data.message_from_id">
            <div class="message">
              {{data.message_from_id}} {{data.messages}}
            </div>
        </div>
        <div class="chat-receiver" v-if="datas.id == data.message_from_id">
            <div class="message" >
            {{data.message_receiver_id}} {{data.messages}}
            </div>
        </div></div>
        <div class="input-message">
        <input type="text" placeholder="Type Message .." class="form-control" v-model="messages">
        <button class="btn btn-dark" @click="submitMessage">Send</button>
        </div>
        </section>
    </div>
</template>

<script setup>
import Header from '@/components/Header.vue'
import { onMounted, ref } from 'vue'

const datas = ref({})
const token = localStorage.getItem('token')
const berear = (async() => {
axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
    await axios({
        method: 'GET',
        url: '/api/user'
    }).then(res => {
       datas.value = res.data
})
})


const allUsersData = ref({})
const allUsers = (id) => {
    axios({
        method: 'GET',
        url: 'api/all-users'
    }).then(response => {
        receiverID.value = id
        allUsersData.value = response.data
    })
}


const fromMessage = ref('')
const receiverID = ref()
const receiverMessage = ref('')
const getUserMessage = (id) => {
    axios({
        method: 'GET',
        url: `/api/get-user-message/${datas.value.id}/${receiverID.value}`
    }).then(response => {
        receiverID.value = id
        fromMessage.value = response.data
        console.log(datas.value.id);
        
    })
}

setTimeout(() => {
   console.log("dsd");
}, 2000);
const messages = ref('')
const submitMessage = () => {
    axios({
        method: 'POST',
        url: `/api/user-message`,
        data: {
            message_from_id: datas.value.id,
            message_receiver_id: receiverID.value,
            messages: messages.value
        }
    }).then(response => {
        console.log(response);
    })

}
onMounted(() => {
    allUsers()
    berear()
})
</script>

<style scoped>
.list-of-users {
    display: grid;
    width: 15rem;
    border: solid 1px rgb(233, 231, 231);
    border-width: 0px 2px 0px 0px;
    position: fixed;
    height: 100%;
    left: 0;
    overflow-x: scroll;
}

.users {
    background: rgb(255, 255, 255);
    width: auto;
    padding: 10px;
    transition: all linear 0.2s;
}

.users:hover {
    background: pink;
}

section {
    position: absolute;
  bottom: 4rem;
  width: 100%;
  background: #cccccc;
  display: grid;
  gap:10px;
  overflow: scroll;
  height: 50rem;
    
}
.chat-message {
    width: 44rem;
    height: 100%;
    background: rgb(231, 223, 223);
    position: fixed;
    right: 0;
}
.chat-text-from{
    display: grid;
    justify-content: start;
}
.message{
    background: violet;
    width: 13rem;
    padding:10px;
    border-radius: 10px;
}
.input-message{
    display: flex;
    gap:10px;
}
.chat-receiver{
        display: grid;
    justify-content: end;

}



</style>