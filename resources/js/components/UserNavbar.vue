<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <router-link class="nav-item nav-link" :to="{name: 'user_index'}">Home</router-link>
            <router-link class="nav-item nav-link" :to="{name:'login'}">Login</router-link>
            <router-link class="nav-item nav-link" :to="{name:'signup'}">Signup</router-link>
          </div>
        </div>
      </nav>
</template>
