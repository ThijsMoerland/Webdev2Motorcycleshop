<template>
    <h1 class="pt-5">Motorcycles</h1>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Brand</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Construction Year</th>
                    <th>Power</th>
                    <th>Mass</th>
                    <th>Engine</th>
                    <th>Accessories</th>
                    <th>Image</th>
                    <th>Sold</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="motorcycle in motorcycles" :key="motorcycle.id">
                    <td>{{ motorcycle.id }}</td>
                    <td>{{ motorcycle.brand }}</td>
                    <td>{{ motorcycle.type }}</td>
                    <td>&euro;{{ motorcycle.price }}</td>
                    <td>{{ motorcycle.constructionYear }}</td>
                    <td>{{ motorcycle.power }}KW</td>
                    <td>{{ motorcycle.mass }}KG</td>
                    <td>{{ motorcycle.engine }}CC</td>
                    <td>{{ motorcycle.accessories }}</td>
                    <td>
                        <img :src="motorcycle.img_url" class="img-thumbnail" alt="Motorcycle Image" />
                    </td>
                    <td>{{ motorcycle.sold }}</td>
                    <td>
                        <button class="btn btn-warning" @click="editMotorcycle(motorcycle.id)">Edit</button>
                        <button class="btn btn-danger" @click="deleteMotorcycle(motorcycle.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>
</template>

<script>
import axios from '../../axios-auth';

export default {
    name: "MotorcycleOverview",
    data() {
        console.log();
        return {
            motorcycles: [ ],
        };
    },
    methods: {
        editMotorcycle(id) {
            this.$router.push(`/editMotorcycle/${id}`);
        },
        getMotorcycles() {
                axios.get('/motorcycles')
                .then((result) => {
                    this.motorcycles = result.data;
                    console.log(this.motorcycles)
                })
                .catch(error => console.log(error))
            },
        deleteMotorcycle(id) {
            if (confirm("Are you sure you want to delete this motorcycle?")){
                axios
                .delete("/motorcycles/" + id)
                .then(() => {
                    this.motorcycles = this.motorcycles.filter(motorcycle => motorcycle.id !== id);
                })
                .catch((error) => alert(error.response.statusText));
            }
            
        },
        checkJWT() {
            if (axios.defaults.headers.common['Authorization'] === null || axios.defaults.headers.common['Authorization'] === undefined) {
                alert("You are not logged in!");
                this.$router.push('/adminLogin');
            }
        }
    },  
    mounted() {
        this.checkJWT();
        this.getMotorcycles();
    },
};
</script>

<style scoped>
th {
    font-weight: bold;
}
</style>