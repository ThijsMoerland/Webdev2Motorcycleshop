<template>
    <ul class="nav bg-primary">
        <li class="nav-item">
            <router-link class="nav-link text-white" to="/">Home</router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link text-white" to="/adminLogin">adminLogin</router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link text-white" to="/motorcycleOverview">Adminview</router-link>
        </li>
        <li class="nav-item">
            <router-link class="nav-link text-white" to="/createMotorcycle">(admin)Create Motorcycle</router-link>
        </li>
    </ul>
</template>

<script>
    import axios from '../axios-auth';
    export default {
        name: "NavigationBar",
    }
    
</script>

<style scoped>
</style>