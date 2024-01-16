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
        
        <MotorcycleItem v-for="motorcycle in motorcycles" :key="motorcycle.id" :brand="motorcycle.brand" :type="motorcycle.type" :price="motorcycle.price" :constructionYear="motorcycle.constructionYear" :power="motorcycle.power" :mass="motorcycle.mass" :engine="motorcycle.engine" :accessories="motorcycle.accessories" :imgUrl="motorcycle.img_url" :sold="motorcycle.sold" @buy="buyItem"></MotorcycleItem>
    </div>
</template>

<script>
import axios from 'axios';

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
            axios.get('http://localhost/motorcycles')
            .then((result) => {
                this.motorcycles = result.data;
                console.log(this.motorcycles);
            })
            .catch(error => console.log(error))
        },
        deleteMotorcycle(id) {
            if (confirm("Are you sure you want to delete this motorcycle?")){
                axios
                .delete("http://localhost/motorcycles/" + id)
                .then(() => {
                    this.motorcycles = this.motorcycles.filter(motorcycle => motorcycle.id !== id);
                })
                .catch((error) => console.error("Error: ", error));
            }
            
        },
    },  
    mounted() {
        this.getMotorcycles();
    },
};
</script>

<style scoped>
th {
    font-weight: bold;
}
</style>