<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Name:</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <b> {{datas.name}}</b>
          </div>
        </div>
      </nav>
</template>
<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';


const datas = ref({})
const token = localStorage.getItem('token')
onMounted(async() => {
axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
    await axios({
        method: 'GET',
        url: '/api/user'
    }).then(res => {
       datas.value = res.data
})
})

</script>
