<template>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <form>
            <div class="mb-3">
              <label for="inputUsername" class="form-label">Username</label>
              <input id="inputUsername" type="text" class="form-control" v-model="username" />
            </div>
            <div class="mb-3">
              <label for="inputPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="inputPassword" v-model="password" />
            </div>
            <button type='button' class="btn btn-primary" @click="loginRequest()">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from '../../axios-auth';

export default {
  name: "adminLogin",
  data() {
    return {
      username: "",
      password: "",
    };
  },
  methods: {
    loginRequest() {
      // Make a POST request to the login endpoint
      axios.post('/users/login', {
        username: this.username,
        password: this.password
      })
      .then(response => {
        if(response.data.jwt === undefined) {
          alert("Login failed!");
          return;
        }
        axios.defaults.headers.common['Authorization'] = "Bearer " + response.data.jwt;
        alert("Login successful!");
        this.$router.push(`/motorcycleOverview`);
      })
      .catch(error => {
        // Handle the error
        alert(error.response.statusText);
      });
    }
  }
};
</script>

<style>
</style>

