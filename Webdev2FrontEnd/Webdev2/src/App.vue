<template>
  <NavigationBar/>
  <div class="container">
    <router-view></router-view>
  </div>
</template> 

 <script>
 import NavigationBar from './components/Navigation.vue';
 export default {
    components: {
      NavigationBar,
    },
  }
</script>

<style>
</style>
