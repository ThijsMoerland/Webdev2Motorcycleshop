<template>
    <ul class="nav bg-primary">
        <li class="nav-item">
            <router-link class="nav-link text-white" to="/">Home</router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link text-white" to="/motorcycleOverview">Admin</router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link text-white" to="/createMotorcycle">(admin)Create Motorcycle</router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link text-white" to="/login">Login / Register</router-link>
        </li>
    </ul>
</template>

<script>
    export default {
        name: "NavigationBar",
    }
    
</script>

<style scoped>
</style>