
<template>
    <Navbar/>
    <div class="container-fluid ">
        <div class="row">
        <div class="col-md-4 mx-auto">

        <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Login</h3>
        </div>


        <form @submit.prevent="login">
        <div class="card-body">

        <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" v-model="input.email">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"  v-model="input.password">
        </div>
        <div class="form-group">
        <div class="input-group">
        <div class="custom-file">
        </div>

        </div>
        </div>
        <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        </div>

        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
        </div>
        </div>
    </div>
</div>

</template>

<script setup>
import Navbar from '@/components/UserNavbar.vue'
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter()
const input = ref({})
const login = async() =>{
    axios.get('/sanctum/csrf-cookie').then(response => {
    axios.post('/api/login', {
        email:input.value.email,
        password: input.value.password,
    }).then(res => {
        if(res.status === 200){
            console.log(res.data);
            localStorage.setItem('token', res.data)
            router.push('list')
        }
    })
});
   }

</script>
