<template>
    <h1 class="pt-5">Motorcycles</h1>
    <div class="row">
        <MotorcycleItem v-for="motorcycle in motorcycles" :key="motorcycle.id" :brand="motorcycle.brand" :type="motorcycle.type" :price="motorcycle.price" :constructionYear="motorcycle.constructionYear" :power="motorcycle.power" :mass="motorcycle.mass" :engine="motorcycle.engine" :accessories="motorcycle.accessories" :imgUrl="motorcycle.img_url" :sold="motorcycle.sold" @buy="buyItem"></MotorcycleItem>
    </div>
</template>

<script>
import MotorcycleItem from './MotorcycleItem.vue';
import axios from 'axios';

export default {
    name: "MotorcycleList",
    components: {
        MotorcycleItem,
    },
    data() {
        console.log();
        return {
            motorcycles: [ ],
        };
    },
    methods: {
        buyItem(brand, type, amount, price) {
            if(amount > 0){
                alert(`${brand} ${type}: ${amount} &euro; ${amount * price}`);
            }
        },
        getProducts() {
                axios.get('http://localhost/motorcycles')
                .then((result) => {
                    this.motorcycles = result.data;
                    console.log(this.motorcycles);
                })
                .catch(error => console.log(error))
            }
    },  
    mounted() {
        this.getProducts();
    },
};
</script>

<style scoped>
</style>