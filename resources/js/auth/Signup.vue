<template>
    <Navbar />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Signup</h3>
                    </div>

                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    >First Name</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter First Name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    >Last Name</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter Last Name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    >Middle Name</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter Middlename"
                                />
                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1"
                                    >Email address</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    placeholder="Enter email"
                                />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"
                                    >Password</label
                                >
                                <input
                                    type="password"
                                    class="form-control"
                                    id="exampleInputPassword1"
                                    placeholder="Enter Password"
                                />
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file"></div>
                                </div>
                            </div>
                             <!-- //Gender -->
                             <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                  Male
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                  Female
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                  Other
                                </label>
                              </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                        <div class="form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck1"
                            />
                            <label
                                class="form-check-label"
                                for="exampleCheck1"
                                >Remember me</label
                            >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Navbar from "@/components/UserNavbar.vue";
</script>
