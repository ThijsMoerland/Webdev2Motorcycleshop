<template>
    <div>
        <ul>
            <li v-for="product in products" :key="product.id">{{ product.name }}</li>
        </ul>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "AboutPage",
        data() {
            return {
                products: [],
            }
        },
        methods: {
            geProducts() {
                axios.get('http://localhost/products')
                .then((result) => {
                    this.products = result.data;
                    console.log(this.products);
                })
                .catch(error => console.log(error))
            }

        },
        mounted() { 
            this.geProducts();
                
        }
    }
</script>

<style scoped>

</style>