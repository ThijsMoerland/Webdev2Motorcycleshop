<template>
    <div>
        <h1 class="pt-5">Create motorcycle</h1>
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="addMotorcycle">
                    <div class="form-group">
                        <label for="brand">Brand:</label>
                        <input type="text" id="brand" class="form-control" v-model="motorcycle.brand" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <input type="text" id="type" class="form-control" v-model="motorcycle.type" required>
                    </div>
                    <div class="form-group">
                        <label for="constructionYear">Construction Year:</label>
                        <input type="date" id="constructionYear" class="form-control" v-model="motorcycle.constructionYear" required>
                    </div>
                    <div class="form-group">
                        <label for="power">Power:</label>
                        <input type="number" id="power" class="form-control" v-model="motorcycle.power" required>
                    </div>
                    <div class="form-group">
                        <label for="power">Price:</label>
                        <input type="number" id="price" class="form-control" v-model="motorcycle.price" required>
                    </div>
                    <div class="form-group">
                        <label for="mass">Mass:</label>
                        <input type="number" id="mass" class="form-control" v-model="motorcycle.mass" required>
                    </div>
                    <div class="form-group">
                        <label for="engine">Engine:</label>
                        <input type="number" id="engine" class="form-control" v-model="motorcycle.engine" required>
                    </div>
                    <div class="form-group">
                        <label for="accessories">Accessories:</label>
                        <input type="text" id="accessories" class="form-control" v-model="motorcycle.accessories" required>
                    </div>
                    <div class="form-group">
                        <label for="imgUrl">Image URL:</label>
                        <input type="text" id="imgUrl" class="form-control" v-model="motorcycle.img_url" required>
                    </div>
                    <div class="form-group">
                            <input type="checkbox" id="sold" name="sold"  v-model="motorcycle.sold">
                            <label for="sold">&nbsp;Sold</label>
                        </div>
                    <button type="submit" class="btn btn-primary">Add Motorcycle</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from '../../axios-auth';
export default {
    name: "CreateMotorcycle",
    data() {
        return {
            motorcycle: {
                brand: "",
                type: "",
                constructionYear: null,
                power: 0,
                price: 0,
                mass: 0,
                engine: 0,
                accessories: "",
                img_url: "",
                sold: false,
            },
        };
    },
    methods: {
        addMotorcycle() {
            axios
                .post("/motorcycles/", this.motorcycle)
                .then(() => {
                    alert("Motorcycle added!");
                    this.$router.push(`/`);
                })
                .catch((error) => {
                    alert(error.response.statusText)
                });

            // Logic to add the motorcycle
            // this.$router.push("/"); // Replace "/home" with the actual path to your home component
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
    },
};
</script>

<style scoped>

</style>