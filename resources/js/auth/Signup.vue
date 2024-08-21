<template>
    <Navbar />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Signup</h3>
                    </div>

                    <form @submit.prevent>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter First Name"
                                    v-model="input.name"
                                />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    >Email</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter Last Name"
                                    v-model="input.email"
                                />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    >Password</label
                                >
                                <input
                                    type="password"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter Last Name"
                                    v-model="input.password"
                                />
                            </div>
                            <div class="row">
                                <button class="btn btn-dark" @click="submit">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Navbar from "@/components/UserNavbar.vue";
import axios from "axios";

const input = ({})
const submit = () => {
    axios({
        method: 'POST',
        url: 'api/signup',
        data: {
            email: input.email,
            name: input.name,
            password:input.password
        }
    }).then(response => {
        console.log(response.data);

    })
}
</script>
