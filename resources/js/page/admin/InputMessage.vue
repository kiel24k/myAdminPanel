<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Type Something..."
                    v-model="input.message"
                    @keyup.enter="sendMessage()"

                />
            </div>
            <div class="col-1">
                <button class="btn btn-info" @click="sendMessage">Send</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';



const props = defineProps(['name'])
const emit = defineEmits(['message'])

const input = ref({
    message: ''
})
const sendMessage = () => {
axios.post('/api/message', {
    room_with: "Sales",
    sender_id: props.name,
    receiver_id: 1,
    message:input.value.message
}).then(response => {
    emit('message')
    input.value.message = ''




})
}
</script>
