<template>
  <ul class="nav bg-primary">
    <li class="nav-item">
      <router-link class="nav-link text-white" to="/">Home</router-link>
    </li>
    <li class="nav-item">
      <router-link class="nav-link text-white" to="/about">Admin</router-link>
    </li>
    <li class="nav-item">
      <router-link class="nav-link text-white" to="/login">Login / Register</router-link>
    </li>
  </ul>
  <div class="container">
    <router-view></router-view>
  </div>
</template> 

 <script>
</script>

<style>
</style>
