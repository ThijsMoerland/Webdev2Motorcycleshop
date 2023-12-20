<template>
    <div>
        <h1 class="pt-5">Create motorcycle</h1>
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="addMotorcycle">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" v-model="motorcycle.name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="currency">Currency</label>
                            <select id="currency" v-model="motorcycle.currency" class="form-control" required>
                                <option value="€" selected>Euro (€)</option>
                                <option value="$">Dollar ($)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" id="price" v-model="motorcycle.price" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Motorcycle</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreateMotorcycle",
    data() {
        return {
            motorcycle: {
                name: "",
                currency: "",
                price: null,
                previousPrice: null,
            },
        };
    },
    methods: {
        addMotorcycle() {
            // Logic to add the motorcycle
            alert("Motorcycle added!");
            this.$router.push("/"); // Replace "/home" with the actual path to your home component
        },
    },
    mounted() {},
};
</script>

<style scoped>

</style>