<template>
  <div class="pt-5 row justify-content-center">
    <div class="col-md-6">
      <div class="form-container h-100">
        <h2 class="form-title">User Information Form</h2>
        <form @submit="submitForm">
          <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" required v-model="firstName">
          </div>
          <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" required v-model="lastName">
          </div>
          <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required v-model="phoneNumber">
          </div>
          <div class="form-group">
            <label for="streetName">Street Name:</label>
            <input type="text" class="form-control" id="streetName" name="streetName" required v-model="streetName">
          </div>
          <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" required v-model="city">
          </div>
          <div class="form-group">
            <label for="postalCode">Postal Code:</label>
            <input type="text" class="form-control" id="postalCode" name="postalCode" required v-model="postalCode">
          </div>
          <button type="submit" class="mt-3 btn btn-primary">Buy Now</button>
        </form>
      </div>
    </div>
    <div class="col-md-6">
        <div class="form-container h-100">
            <h2 class="form-title">Order Summary</h2>
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-end justify-content-between">
                <div>
                    <p>ID: {{ motorcycle.id }}</p>
                    <p>Brand: {{ motorcycle.brand }}</p>
                    <p>Type: {{ motorcycle.type }}</p>
                    <p>Construction Year: {{ motorcycle.constructionYear }}</p>
                    <p>Price: &euro;{{ motorcycle.price }}</p>
                    <p>Power: {{ motorcycle.power }} KW</p>
                    <p>Mass: {{ motorcycle.mass }} KG</p>
                    <p>Engine: {{ motorcycle.engine }} CC</p>
                    <p>Accessories: {{ motorcycle.accessories }}</p>
                </div>
                <img :src="motorcycle.img_url" alt="Motorcycle image" class="align-self-md-start ml-md-auto mt-md-0"> <!-- Position image at the top right -->
            </div>
        </div>

    </div>
  </div>

  
</template>

<script>
import axios from '../axios-auth';

export default {
    props: {
        id: Number,
    },
    data() {
        return {
            id : this.id,
            firstName: '',
            lastName: '',
            phoneNumber: '',
            streetName: '',
            city: '',
            postalCode: '',
            motorcycle: [],
            // Add more data properties for other information
        };
    },
    methods: {
        submitForm() {
            alert('Order submitted');
            
        },
        getMotorcycle() {
                axios.get('/motorcycles/' + this.id)
                .then((result) => {
                    this.motorcycle = result.data;
                })
                .catch(error => console.log(error))
            },

    },
    mounted() {
        this.getMotorcycle();
    }

};
</script>

<style scoped>
body {
    background-color: #f8f9fa;
}
.form-container {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    padding: 40px;
}
.form-title {
    text-align: center;
    margin-bottom: 30px;
    color: #343a40;
}
img {
    max-width: 50%; 
    max-height: 100%; 
    object-fit: contain;
}   
</style>